<?php

namespace App\Modules\SuCoYKhoa\src\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Nhansu\src\Repositories\Interface\ChiNhanhRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\PhongBanRepositoryInterface;
use App\Modules\SuCoYKhoa\src\Http\Request\BaoCaoSuCoRequest;
use App\Modules\SuCoYKhoa\src\Repositories\Interface\BaoCaoSuCoYKhoaRepositoryInterface;
use App\Http\Requests\PaginationRequest;
use App\Services\FileService;

class BaoCaoSuCoYKhoaController extends Controller
{
    private BaoCaoSuCoYKhoaRepositoryInterface $baoCaoSuCoYKhoaRepository;
    private ChiNhanhRepositoryInterface $chiNhanhRepository;
    private FileService $fileService;

    private PhongBanRepositoryInterface $phongBanRepository;

    public function __construct(
        BaoCaoSuCoYKhoaRepositoryInterface $baoCaoSuCoYKhoaRepository,
        ChiNhanhRepositoryInterface $chiNhanhRepository,
        FileService $fileService,
        PhongBanRepositoryInterface $phongBanRepository
    ) {
        $this->baoCaoSuCoYKhoaRepository = $baoCaoSuCoYKhoaRepository;
        $this->chiNhanhRepository = $chiNhanhRepository;
        $this->fileService = $fileService;
        $this->phongBanRepository = $phongBanRepository;
    }

    public function viewBaoCao($cnSlug)
    {
        $chiNhanh = $this->chiNhanhRepository->findBySlug($cnSlug);
        if (!$chiNhanh) abort(404);

        $phongBan = $this->phongBanRepository->allByChiNhanhId($chiNhanh->id);

        return view('SuCoYKhoa::bao_cao.bao_cao_su_co', [
            'chi_nhanh' => $chiNhanh,
            'phongBan' => $this->phongBanRepository->pluck($phongBan, 'ten', 'id')
        ]);
    }


    public function create(BaoCaoSuCoRequest $request)
    {
        $mainField = [
            'ho_ten_nguoi_benh', 'ngay_bao_cao', 'ngay_su_co', 'khoa_phong_ban_id', 'mo_ta', 'de_xuat_giai_phap',
            'giai_phap_da_thuc_hien', 'ho_ten_nguoi_bao_cao', '_token', 'muc_do'
        ];

        $input = $request->only($mainField);
        $input['chi_tiet'] = $request->except($mainField);

        $cnSlug = $request->get('chi_nhanh_slug', '');
        $chiNhanh = $this->chiNhanhRepository->findBySlug($cnSlug);
        if (!$chiNhanh) abort(404);


        $baoCao = $this->baoCaoSuCoYKhoaRepository->create($input);
        if (empty($baoCao)) {
            return redirect()
                ->back()
                ->withErrors('Tạo báo cáo thất bại');
        }

        $baoCao->ma = $this->baoCaoSuCoYKhoaRepository->renderMaBc($baoCao);
        $baoCao->chi_nhanh_id = $chiNhanh->id;
        $baoCao->save();

        session()->flash('success', 'Bạn đã gửi báo cáo thành công! Mã báo cáo là: <b>'.$baoCao->ma.'</b>');

        return redirect()
            ->back();
    }

    public function danhSach(PaginationRequest $request)
    {
        $paginate['limit']      = $request->limit();
        $paginate['offset']     = $request->offset();
        $paginate['order']      = $request->order();
        $paginate['direction']  = $request->direction();
        $paginate['baseUrl']    = route('sucoykhoa.danhSachSuCo');
        $filter = [];
        $keyword = $request->get('keyword');
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->baoCaoSuCoYKhoaRepository->countByFilter($filter);
        $models = $this->baoCaoSuCoYKhoaRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'SuCoYKhoa::quan_ly.danh_sach_bao_cao',
            [
                'models'    => $models,
                'count'         => $count,
                'paginate'      => $paginate,
                'keyword'       => $keyword
            ]
        );
    }
}
