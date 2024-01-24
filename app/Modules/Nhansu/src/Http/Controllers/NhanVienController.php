<?php

namespace App\Modules\Nhansu\src\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginationRequest;
use App\Modules\Nhansu\src\Http\Requests\NhanVien\NhanVienRequest;
use App\Modules\Nhansu\src\Models\NhanVien;
use App\Modules\Nhansu\src\Repositories\Interface\ChiTietNhanVienRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\LoaiNhanVienRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\NhanVienRepositoryInterface;
use App\Repositories\Interface\UserRepositoryInterface;
use App\Repositories\Interface\UserRoleRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NhanVienController extends Controller
{
    private NhanVienRepositoryInterface $nhanVienRepository;
    private UserRepositoryInterface $userRepository;
    private UserRoleRepositoryInterface $userRoleRepository;
    private ChiTietNhanVienRepositoryInterface $chiTietNhanVienRepository;
    private LoaiNhanVienRepositoryInterface $loaiNhanVienRepository;


    public function __construct(
        UserRepositoryInterface $userRepository,
        UserRoleRepositoryInterface $userRoleRepository,
        NhanVienRepositoryInterface $nhanVienRepository,
        ChiTietNhanVienRepositoryInterface $chiTietNhanVienRepository,
        LoaiNhanVienRepositoryInterface $loaiNhanVienRepository
    ) {
        $this->userRepository = $userRepository;
        $this->userRoleRepository = $userRoleRepository;
        $this->nhanVienRepository = $nhanVienRepository;
        $this->chiTietNhanVienRepository = $chiTietNhanVienRepository;
        $this->loaiNhanVienRepository = $loaiNhanVienRepository;
    }

    public function index(PaginationRequest $request)
    {
        $paginate['limit']      = $request->limit();
        $paginate['offset']     = $request->offset();
        $paginate['order']      = $request->order();
        $paginate['direction']  = $request->direction();
        $paginate['baseUrl']    = route('nhansu.nhan-vien.index');
        $keyword = $request->get('keyword');

        $filter = [];
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $loaiNVSearch = $request->get('type', null);
        if ($loaiNVSearch) {
            $filter['loai_nhan_vien_id'] =  $loaiNVSearch;
        }

        $count = $this->nhanVienRepository->countByFilter($filter);
        $models = $this->nhanVienRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        $this->nhanVienRepository->load($models, ['chiNhanh', 'loaiNhanVien']);

        $nhanVienByType = $this->nhanVienRepository->countByType();
        $loaiNhanVien = $this->loaiNhanVienRepository->all();

        return view(
            'Nhansu::nhan_vien.index',
            [
                'models'    => $models,
                'count'         => $count,
                'paginate'      => $paginate,
                'keyword'       => $keyword,
                'nhanVienByType' => $nhanVienByType,
                'loaiNhanVien' => $this->loaiNhanVienRepository->pluck($loaiNhanVien, 'ten', 'id'),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = $this->nhanVienRepository->findById($id);
        $model = $this->nhanVienRepository->load($model, 'chiTietNhanVien');
        if (!$model) abort(404);

        $loaiNhanVien = $this->loaiNhanVienRepository->all();

        return view('Nhansu::nhan_vien.chi_tiet', [
            'model' => $model,
            'loaiNhanVien' => $this->loaiNhanVienRepository->pluck($loaiNhanVien, 'ten', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $model = $this->nhanVienRepository->findById($id);
        $chiTietNhanVien = $model->chiTietNhanVien;

        if (!$model) abort(404);
        if (!$chiTietNhanVien) abort(404);

        $inputNhanVien = $request->only([
            'ho_ten',
            'email',
            'dien_thoai_cong_viec',
            'gioi_tinh',
            'loai_nhan_vien_id',
            'ngay_sinh',
        ]);

        $inputChiTiet = $request->only([
            'que_quan', 'dan_toc', 'ton_giao', 'dia_chi_thuong_tru', 'dia_chi_tam_tru', 'ma_so_thue', 'dien_thoai_ca_nhan',
            'tinh_trang_hon_nhan', 'email_phu', 'ngay_bat_dau_lam_viec', 'ngay_ket_thuc_lam_viec', 'ngay_thuc_te_lam_viec', 'cmnd',
            'ngay_cap_cmnd', 'noi_cap_cmnd', 'trinh_do_chuyen_mon', 'so_cchn', 'bo_sung_pham_vi_cm', 'ngay_cap_cchn',
            'dang_ki_hanh_nghe_hien_tai', 'bien_oto', 'bien_xe_may', 'size_quan', 'size_ao', 'size_giay_dep', 'bang_lai',
        ]);


        DB::beginTransaction();
        try {

            $this->nhanVienRepository->update($model, $inputNhanVien);
            $this->chiTietNhanVienRepository->update($chiTietNhanVien, $inputChiTiet);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;

        }

        session()->flash('success', 'Cập nhật nhân viên thành công!');
        return redirect()
            ->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = $this->nhanVienRepository->findById($id);
        if (!$model) abort(404);

        DB::beginTransaction();
        try {
            $this->nhanVienRepository->delete($model);
            $this->chiTietNhanVienRepository->deleteByFilter(['nhan_vien_id' => $model->id]);
            $this->userRepository->deleteByFilter(['id' => $model->user_id]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        session()->flash('success', 'Xóa nhân viên thành công!');

        return redirect()->route('nhansu.nhan-vien.index');
    }
}
