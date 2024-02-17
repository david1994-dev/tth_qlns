<?php

namespace App\Modules\Nhansu\src\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginationRequest;
use App\Models\User;
use App\Modules\Nhansu\Helpers\NhanVienHelper;
use App\Modules\Nhansu\src\Repositories\Interface\ChiTietNhanVienRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\LoaiNhanVienRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\NhanVienRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\UngVienRepositoryInterface;
use App\Repositories\Interface\UserRepositoryInterface;
use App\Repositories\Interface\UserRoleRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class NhanVienController extends Controller
{
    private NhanVienRepositoryInterface $nhanVienRepository;
    private UserRepositoryInterface $userRepository;
    private UserRoleRepositoryInterface $userRoleRepository;
    private ChiTietNhanVienRepositoryInterface $chiTietNhanVienRepository;
    private LoaiNhanVienRepositoryInterface $loaiNhanVienRepository;
    private UngVienRepositoryInterface $ungVienRepository;


    public function __construct(
        UserRepositoryInterface $userRepository,
        UserRoleRepositoryInterface $userRoleRepository,
        NhanVienRepositoryInterface $nhanVienRepository,
        ChiTietNhanVienRepositoryInterface $chiTietNhanVienRepository,
        LoaiNhanVienRepositoryInterface $loaiNhanVienRepository,
        UngVienRepositoryInterface $ungVienRepository,
    ) {
        $this->userRepository = $userRepository;
        $this->userRoleRepository = $userRoleRepository;
        $this->nhanVienRepository = $nhanVienRepository;
        $this->chiTietNhanVienRepository = $chiTietNhanVienRepository;
        $this->loaiNhanVienRepository = $loaiNhanVienRepository;
        $this->ungVienRepository = $ungVienRepository;
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
    public function create(){
        $loaiNhanVien = $this->loaiNhanVienRepository->all();

        return view (
            'Nhansu::nhan_vien.create',
            [
                'loaiNhanVien' => $this->loaiNhanVienRepository->pluck($loaiNhanVien, 'ten', 'id')
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

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

        $inputNhanVien['email'] = NhanVienHelper::renderTTHEmail($inputNhanVien['ho_ten']);

        DB::beginTransaction();
        try {

            $nhanVien = $this->nhanVienRepository->create($inputNhanVien);

            $maNv = $this->nhanVienRepository->renderMaNv($nhanVien->id);
            $nhanVien->ma = $maNv;
            $nhanVien->save();

            $inputChiTiet['nhan_vien_id'] = $nhanVien->id;
            $this->chiTietNhanVienRepository->create($inputChiTiet);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;

        }

        session()->flash('success', 'Bạn đã tạo nhân viên thành công, mã nhân viên là: <b>'.$nhanVien->ma.'</b>');
        return redirect()
            ->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = $this->nhanVienRepository->findById($id);
        $model = $this->nhanVienRepository->load($model, ['chiTietNhanVien', 'loaiNhanVien']);
        if (!$model) abort(404);

        return view('Nhansu::nhan_vien.view', [
            'model' => $model,
        ]);
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

        return view('Nhansu::nhan_vien.edit', [
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

        $this->nhanVienRepository->delete($model);

        session()->flash('success', 'Xóa nhân viên thành công!');

        return redirect()->route('nhansu.nhan-vien.index');
    }

    public function chuyenUngVien(Request $request, $id)
    {
        $ungVien = $this->ungVienRepository->findById($id);
        if (!$ungVien) abort(404);

        $isExist = $this->nhanVienRepository->findByDienThoaiCongViec($ungVien->dien_thoai);
        if ($isExist) {
            session()->flash('error', 'Nhân viên đã tồn tại!');
            return redirect()->route('nhansu.danhSachUngVien');
        }

        DB::beginTransaction();
        try {
            //create nhan vien mapping voi ung vien thong qua so dien thoai
            $nhanVien = $this->nhanVienRepository->create([
                'ho_ten' => $ungVien->ho_ten,
                'email' => NhanVienHelper::renderTTHEmail($ungVien->ho_ten),
                'ngay_sinh' => $ungVien->ngay_sinh,
                'dien_thoai_cong_viec' => $ungVien->dien_thoai,
                'loai_nhan_vien_id' => 3, //hoc viec
            ]);

            $maNv = $this->nhanVienRepository->renderMaNv($nhanVien->id);
            $nhanVien->ma = $maNv;
            $nhanVien->save();

            $this->chiTietNhanVienRepository->create([
                'nhan_vien_id' => $nhanVien->id,
                'email_phu' => $nhanVien->email,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        if (!$nhanVien) {
            session()->flash('error', 'Tạo nhân viên thất bại');
            return redirect()->route('nhansu.danhSachUngVien');
        }

        session()->flash('success', 'Bạn đã tạo nhân viên thành công, mã nhân viên là: <b>'.$nhanVien->ma.'</b>');

        return redirect()->route('nhansu.nhan-vien.index');
    }

    public function taoAccount(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'password' => 'required|string|confirmed',
            'email' => 'required|email|unique:users|max:255',
        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 'error', 'message' => 'Tạo account thất bại!. Email đã được đăng kí hoặc sai định dạng thông tin!']);
        }

        $nhanVienId = $request->get('nhan_vien_id', 0);
        $nhanVien = $this->nhanVienRepository->findById($nhanVienId);
        if (!$nhanVien) {
            return response()->json(['status' => 'error', 'message' => 'Nhân viên không tồn tại!']);
        }

        $password = $request->get('password', '12345678');

        $user = $this->userRepository->createAccount([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($password),
        ]);

        if (!$user) {
            return response()->json(['status' => 'error', 'message' => 'Tạo account thất bại!']);
        }

        $nhanVien->user_id = $user->id;
        $nhanVien->save();

        return response()->json(['status' => 'success', 'message' => 'Tạo account thành công!']);
    }

    public function searchAjax(PaginationRequest $request)
    {
        $paginate['limit']      = $request->limit(50);
        $paginate['offset']     = $request->offset();
        $paginate['order']      = $request->order();
        $paginate['direction']  = $request->direction();

        $search = $request->get('search');
        $filter['query'] = $search;

        $count = $this->nhanVienRepository->countByFilter($filter);
        $models = $this->nhanVienRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);
        $items = [];
        foreach ($models as $model) {
            $items[] = [
                'id' => $model->user_id,
                'text' => $model->ho_ten .'( - '.$model->ma.' - '.$model->phongBan->ten.')'
            ];
        }

        return response()->json(['items' => $items, 'count' => $count]);
    }
}
