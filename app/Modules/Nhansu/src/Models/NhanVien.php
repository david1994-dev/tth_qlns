<?php

namespace App\Modules\Nhansu\src\Models;

use App\Models\Base;
use Illuminate\Database\Eloquent\SoftDeletes;

class NhanVien extends Base
{
    use SoftDeletes;

    protected $table = 'nhanvien';
    const GIOI_TINH_NU = 0;
    const GIOI_TINH_NAM = 1;
    protected $fillable = [
        'ma',
        'ho_ten',
        'image',
        'email',
        'dien_thoai',
        'cmnd',
        'email_cong_viec',
        'gioi_tinh',
        'ngay_sinh',
        'ngay_bat_dau_lam_viec',
        'ngay_ket_thuc_lam_viec',
        'chi_nhanh_id',
        'vi_tri_cong_viec_id',
        'phong_ban_id',
        'chi_tiet'
    ];

    protected $casts = [
        'chi_tiet' => 'array',
        'deleted_at' => 'datetime:Y-m-d H:i:s',
        'ngay_sinh' => 'date'
    ];
}
