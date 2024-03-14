<?php

namespace App\Modules\Nhansu\src\Models;

use App\Models\Base;
use App\Models\User;
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

    protected $fillable = [
        'ma',
        'user_id',
        'ho_ten',
        'email',
        'dien_thoai_cong_viec',
        'gioi_tinh',
        'loai_nhan_vien_id',
        'ngay_sinh',
        'chi_nhanh_id',
        'phong_ban_id',
        'vi_tri_cong_viec_id'
    ];

    protected $casts = [
        'deleted_at' => 'datetime:Y-m-d H:i:s',
        'ngay_sinh' => 'date'
    ];

    public function chiTietNhanVien()
    {
        return $this->hasOne(ChiTietNhanVien::class, 'nhan_vien_id', 'id');
    }

    public function chiNhanh()
    {
        return $this->hasOne(ChiNhanh::class, 'id', 'chi_nhanh_id');
    }

    public function phongBan()
    {
        return $this->hasOne(PhongBan::class, 'id', 'phong_ban_id');
    }

    public function loaiNhanVien()
    {
        return $this->hasOne(LoaiNhanVien::class, 'id', 'loai_nhan_vien_id');
    }

    public function viTriCongViec()
    {
        return $this->hasOne(ViTriCongViec::class, 'id', 'vi_tri_cong_viec_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    protected static function boot() {
        parent::boot();

        static::deleted(function ($nv) {
            $nv->chiTietNhanVien()->delete();
            $nv->user()->delete();
        });
    }
}
