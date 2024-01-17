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
    const GIOI_TINH_LGBT = 2;

    const GIOI_TINH = [
        self::GIOI_TINH_NU => 'Nữ',
        self::GIOI_TINH_NAM => 'Nam',
        self::GIOI_TINH_LGBT => 'LGBT',
    ];

    const LOAI_NHAN_VIEN = [
        self::LOAI_THU_VIEC => 'Thử Việc',
        self::LOAI_CHINH_THUC => 'Chính Thức',
    ];

    const LOAI_THU_VIEC = 1;
    const LOAI_CHINH_THUC = 2;


    protected $fillable = [
        'user_id',
        'ma',
        'ho_ten',
        'email',
        'dien_thoai_cong_viec',
        'gioi_tinh',
        'loai_nhan_vien',
        'ngay_sinh',
        'chi_nhanh_id',
        'phong_ban_id'
    ];

    protected $casts = [
        'chi_tiet' => 'array',
        'deleted_at' => 'datetime:Y-m-d H:i:s',
        'ngay_sinh' => 'date'
    ];

    public function chiTietNhanVien()
    {
        return $this->hasOne(ChiTietNhanVien::class, 'nhan_vien_id', 'id');
    }
}
