<?php

namespace App\Modules\Nhansu\src\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\ModuleRouterServiceProvider;
use App\Modules\Nhansu\src\Http\Requests\NhanVien\UngVienRequest;
use App\Modules\Nhansu\src\Repositories\Interface\UngVienRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UngVienController extends Controller
{
    private UngVienRepositoryInterface $ungVienRepository;
    public function __construct(UngVienRepositoryInterface $ungVienRepository)
    {
        $this->ungVienRepository = $ungVienRepository;
    }

    public function index($type)
    {
        switch ($type) {
            case 'bac-si':
                $a = $this->ungVienRepository->findById(1);
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
            'vi_tri_ung_tuyen', 'ho_ten', 'dien_thoai','email', 'dia_chi',
            'qua_trinh_lam_viec', 'vi_tri_ung_tuyen', 'don_vi_ung_tuyen',
            'ngay_sinh', 'thang_sinh', 'nam_sinh', 'loai_ung_vien'
        ];

        $input = $request->only($mainField);
        $input['ngay_sinh'] = Carbon::createFromDate($input['nam_sinh'], $input['thang_sinh'], $input['ngay_sinh']);
        if ($request->get('ky', 0)) {
            $input['ngay_ky'] = now()->clone();
        }

        $input['chi_tiet'] = $request->except($mainField);
        $ungVien = $this->ungVienRepository->create($input);

        if (empty($ungVien)) {
            return redirect()
                ->back()
                ->withErrors('Tạo ứng viên thất bại');
        }

        session()->flash('success', 'Bạn đã gửi khảo sát thành công');

        return redirect()
            ->back();
    }
}
