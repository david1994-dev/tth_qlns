<?php

namespace App\Modules\Nhansu\src\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginationRequest;
use App\Modules\Nhansu\src\Http\Requests\NhanVien\UngVienRequest;
use App\Modules\Nhansu\src\Models\UngVien;
use App\Modules\Nhansu\src\Repositories\Interface\ChiNhanhRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\UngVienRepositoryInterface;
use App\Services\FileService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class UngVienController extends Controller
{
    private UngVienRepositoryInterface $ungVienRepository;
    private ChiNhanhRepositoryInterface $chiNhanhRepository;
    private FileService $fileService;
    public function __construct(
        UngVienRepositoryInterface $ungVienRepository,
        FileService $fileService,
        ChiNhanhRepositoryInterface $chiNhanhRepository
    ) {
        $this->ungVienRepository = $ungVienRepository;
        $this->fileService = $fileService;
        $this->chiNhanhRepository = $chiNhanhRepository;
    }

    public function index()
    {
        return view('Nhansu::khao_sat.index');
    }

    public function viewKhaoSat($type, $chiNhanhSlug)
    {
        return match ($type) {
            'bac-si' => view('Nhansu::khao_sat.ksuv_bac_si', ['chiNhanhSlug' => $chiNhanhSlug]),
            'duoc-si' => view('Nhansu::khao_sat.ksuv_duoc_si', ['chiNhanhSlug' => $chiNhanhSlug]),
            'van-phong' => view('Nhansu::khao_sat.ksuv_van_phong', ['chiNhanhSlug' => $chiNhanhSlug]),
            default => '',
        };
    }

    public function store(UngVienRequest $request)
    {
        $mainField = [
            'vi_tri_ung_tuyen', 'ho_ten', 'dien_thoai','email', 'dia_chi', 'don_vi_ung_tuyen',
            'ngay_sinh', 'loai_ung_vien', 'thoi_gian_lam_viec',
            'don_vi_cong_tac', 'vi_tri_lam_viec', '_token'
        ];

        $chiNhanh = $this->chiNhanhRepository->findBySlug($request->get('chi_nhanh_slug', ''));
        if (empty($chiNhanh)) {
            return redirect()
                ->back()
                ->withErrors('Tạo ứng viên thất bại!. Chi nhánh không tồn tại!');
        }

        $input = $request->only($mainField);
        $input['ngay_sinh'] = Carbon::parse($input['ngay_sinh']);
        $input['ngay_ky'] = now()->clone();
        $input['chi_nhanh_id'] = $chiNhanh->id;

        $workingProcess = [];
        $workTimes = $request->get('thoi_gian_lam_viec', []);
        $workPositions = $request->get('vi_tri_lam_viec', []);
        $workCompanies = $request->get('don_vi_cong_tac', []);
        foreach ($workTimes as $key => $workTime) {
            if (!$workTime) {
                break;
            }

            $workCompany = Arr::get($workCompanies, $key, null);
            if (!$workCompany) {
                break;
            }

            $workingProcess[$workTime][$workCompany] = Arr::get($workPositions, $key, null);
        }

        $input['qua_trinh_lam_viec'] = $workingProcess;
        $input['chi_tiet'] = $request->except($mainField);

        //upload image
        if ($request->hasFile('image')) {
            $image = $this->fileService->uploadImage('ung_vien' ,$request->file('image'));
            if (!empty($image)) {
                $input['image'] = $image;
            }
        }

        $ungVien = $this->ungVienRepository->create($input);

        if (empty($ungVien)) {
            return redirect()
                ->back()
                ->withErrors('Tạo ứng viên thất bại');
        }

        $ungVien->mauv = $this->ungVienRepository->renderMauv($ungVien);
        $ungVien->save();

        session()->flash('success', 'Bạn đã gửi khảo sát thành công! Mã ứng viên của bạn là: <b>'.$ungVien->mauv.'</b>');

        return redirect()
            ->back();
    }

    public function danhSach(PaginationRequest $request)
    {
        $paginate['limit']      = $request->limit();
        $paginate['offset']     = $request->offset();
        $paginate['order']      = $request->order();
        $paginate['direction']  = $request->direction();
        $paginate['baseUrl']    = route('nhansu.danhSachUngVien');

        $user = auth()->user();
        $nhanVien = $user->nhanVien;

        if (!$nhanVien) {
            return redirect()
                ->back()
                ->withErrors('Nhân viên không tồn tại');
        }

        $filter['chi_nhanh_id'] = $nhanVien->chi_nhanh_id;

        $keyword = $request->get('keyword');
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->ungVienRepository->countByFilter($filter);
        $models = $this->ungVienRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'Nhansu::khao_sat.danh_sach',
            [
                'models'    => $models,
                'count'         => $count,
                'paginate'      => $paginate,
                'keyword'       => $keyword
            ]
        );
    }

    public function view($id)
    {
        $user = auth()->user();
        $nhanVien = $user->nhanVien;
        if (!$nhanVien) {
            return redirect()
                ->back()
                ->withErrors('Nhân viên không tồn tại');
        }

        $model = $this->ungVienRepository->findById($id);

        if (!$model) abort(404);

        if ($model->chi_nhanh_id != $nhanVien->chi_nhanh_id) {
            abort(403);
        }

        $blade = match ($model->loai_ung_vien) {
            UngVien::LOAI_UNG_VIEN_BAC_SI => 'chi_tiet_uv_bac_si',
            UngVien::LOAI_UNG_VIEN_DUOC_SI => 'chi_tiet_uv_duoc_si',
            UngVien::LOAI_UNG_VIEN_VAN_PHONG => 'chi_tiet_uv_van_phong',
            default => '',
        };

        return view(
            'Nhansu::khao_sat.chi_tiet_ung_vien.'.$blade,
            [
                'model'    => $model,
            ]
        );
    }
}
