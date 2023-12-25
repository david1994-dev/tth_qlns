<?php

namespace App\Modules\Nhansu\src\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\ModuleRouterServiceProvider;
use App\Modules\Nhansu\src\Http\Requests\NhanVien\UngVienRequest;
use App\Modules\Nhansu\src\Repositories\Interface\UngVienRepositoryInterface;
use Carbon\Carbon;

class UngVienController extends Controller
{
    private UngVienRepositoryInterface $ungVienRepository;
    public function __construct(UngVienRepositoryInterface $ungVienRepository)
    {
        $this->ungVienRepository = $ungVienRepository;
    }

    public function store(UngVienRequest $request)
    {
        $input = $request->only([
            'ho_ten', 'dien_thoai','email', 'dia_chi',
            'qua_trinh_lam_viec', 'vi_tri_ung_tuyen', 'don_vi_ung_tuyen'
        ]);

        $input['ngay_sinh'] = Carbon::parse('ngay_sinh');
        if ($request->get('ky', 0)) {
            $input['ngay_ky'] = now()->clone();
        }

        $input['chi_tiet'] = [

        ];

        $ungVien = $this->ungVienRepository->create($input);

        if (empty($ungVien)) {
            return redirect()
                ->back()
                ->withErrors('Tạo ứng viên thất bại');
        }

        return redirect(ModuleRouterServiceProvider::UNG_VIEN_CREATE_FORM);
    }
}
