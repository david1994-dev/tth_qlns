<?php

namespace App\Modules\Nhansu\src\Models;

use App\Models\Base;

class UngVien extends Base
{
    protected $table = 'ungvien';

    const LOAI_UNG_VIEN_BAC_SI = 1;
    const LOAI_UNG_VIEN_DUOC_SI = 2;
    const LOAI_UNG_VIEN_VAN_PHONG = 3;

    const LOAI_UNG_VIEN_TEXT = [
        self::LOAI_UNG_VIEN_BAC_SI => 'Bác Sĩ',
        self::LOAI_UNG_VIEN_DUOC_SI => 'Dược Sĩ',
        self::LOAI_UNG_VIEN_VAN_PHONG => 'Văn Phòng',
    ];

    protected $fillable = [
        'mauv',
        'ho_ten',
        'ngay_sinh',
        'dien_thoai',
        'email',
        'dia_chi',
        'qua_trinh_lam_viec',
        'don_vi_ung_tuyen',
        'ngay_ky',
        'chi_tiet',
        'vi_tri_ung_tuyen',
        'loai_ung_vien'
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
