<?php

namespace App\Modules\Nhansu\src\Models;

use App\Models\Base;

class UngVien extends Base
{
    protected $table = 'nhanvien';

    const LOAI_UNG_VIEN_BAC_SI = 1;
    const LOAI_UNG_VIEN_DUOC_SI = 2;
    const LOAI_UNG_VIEN_VAN_PHONG = 3;

    protected $fillable = [
        'ho_ten',
        'ngay_sinh',
        'dien_thoai',
        'email',
        'dia_chi',
        'qua_trinh_lam_viec',
        'nguyen_vong_lam_viec',
        'don_vi_ung_tuyen',
        'ngay_ky',
        'chi_tiet'
    ];

    protected $casts = [
        'qua_trinh_lam_viec' => 'array',
        'chi_tiet' => 'array',
        'vi_tri_lam_viec' => 'array',
        'don_vi_ung_tuyen' => 'array',
        'ngay_ky' => 'datetime:Y-m-d H:i:s',
        'ngay_sinh' => 'date:Y-m-d'
    ];
}
