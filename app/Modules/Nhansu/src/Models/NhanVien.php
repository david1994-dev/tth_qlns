<?php

namespace App\Modules\Nhansu\src\Models;

use App\Models\Base;

class NhanVien extends Base
{
    protected $table = 'nhanvien';
    const GIOI_TINH_NU = 0;
    const GIOI_TINH_NAM = 1;
    protected $fillable = [
        'ma',
        'hoTen',
        'image',
        'email',
        'dienThoai',
        'cmnd',
        'emailCongViec',
        'gioiTinh',
        'ngaySinh',
        'ngayBatDauLamViec',
        'ngayKetThucLamViec',
        'chi_nhanh_id',
        'vi_tri_cong_viec_id',
        'phong_ban_id',
        'chiTiet'
    ];

    protected $casts = [
        'chitiet' => 'array',
    ];
}
