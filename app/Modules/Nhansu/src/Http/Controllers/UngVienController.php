<?php

namespace App\Modules\Nhansu\src\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginationRequest;
use App\Modules\ModuleRouterServiceProvider;
use App\Modules\Nhansu\src\Http\Requests\NhanVien\UngVienRequest;
use App\Modules\Nhansu\src\Models\UngVien;
use App\Modules\Nhansu\src\Repositories\Interface\UngVienRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class UngVienController extends Controller
{
    private UngVienRepositoryInterface $ungVienRepository;
    public function __construct(UngVienRepositoryInterface $ungVienRepository)
    {
        $this->ungVienRepository = $ungVienRepository;
    }

    public function index()
    {
        return view('Nhansu::khao_sat.index');
    }

    public function viewKhaoSat($type)
    {
        switch ($type) {
            case 'bac-si':
                $a = $this->ungVienRepository->findById(7);
//                dd($a->qua_trinh_lam_viec);
                return view('Nhansu::khao_sat.ksuv_bac_si');
            case 'duoc-si':
                return view('Nhansu::khao_sat.ksuv_duoc_si');
            case 'van-phong':
                return view('Nhansu::khao_sat.ksuv_van_phong');
            default:
                return '';
        }
    }

    public function store(UngVienRequest $request)
    {
        $mainField = [
            'vi_tri_ung_tuyen', 'ho_ten', 'dien_thoai','email', 'dia_chi', 'don_vi_ung_tuyen',
            'ngay_sinh', 'thang_sinh', 'nam_sinh', 'loai_ung_vien', 'thoi_gian_lam_viec',
            'don_vi_cong_tac', 'vi_tri_lam_viec'
        ];

        $input = $request->only($mainField);
        $input['ngay_sinh'] = Carbon::createFromDate($input['nam_sinh'], $input['thang_sinh'], $input['ngay_sinh']);
        $input['ngay_ky'] = now()->clone();

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
        $ungVien = $this->ungVienRepository->create($input);

        if (empty($ungVien)) {
            return redirect()
                ->back()
                ->withErrors('Tạo ứng viên thất bại');
        }

        $ungVien->mauv = $this->renderMauv($ungVien);
        $ungVien->save();

        session()->flash('success', 'Bạn đã gửi khảo sát thành công! Mã ứng viên của bạn là: <b>'.$ungVien->mauv.'</b>');

        return redirect()
            ->back();
    }

    private function renderMauv($ungVien)
    {
        $prefix = [
            UngVien::LOAI_UNG_VIEN_BAC_SI => 'BS',
            UngVien::LOAI_UNG_VIEN_DUOC_SI => 'DS',
            UngVien::LOAI_UNG_VIEN_VAN_PHONG => 'VP',
        ];

        return Arr::get($prefix, $ungVien->loai_ung_vien, '').'_'.base_convert($ungVien->id, 10, 36);
    }

    public function danhSach(PaginationRequest $request)
    {
        $paginate['limit']      = $request->limit();
        $paginate['offset']     = $request->offset();
        $paginate['order']      = $request->order();
        $paginate['direction']  = $request->direction();
        $paginate['baseUrl']    = route('danhSachUngVien');

        $filter = [];
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
}
