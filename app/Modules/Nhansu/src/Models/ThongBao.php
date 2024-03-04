<?php

namespace App\Modules\Nhansu\src\Models;

use App\Models\Base;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class ThongBao extends Base
{
    use SoftDeletes;

    const TYPE_CONG_VAN = 1;

    const MUC_DO_BINH_THUONG = 1;
    const MUC_DO_KHAN = 2;
    const MUC_DO_MAT = 3;
    const MUC_DO = [
        self::MUC_DO_BINH_THUONG => [
            'id' => self::MUC_DO_BINH_THUONG,
            'name' => 'Bình Thường',
            'color' => '0xff8f8f8f'
        ],
        self::MUC_DO_KHAN => [
            'id' => self::MUC_DO_KHAN,
            'name' => 'Khẩn',
            'color' => '0xFFC2002F'
        ],
        self::MUC_DO_MAT => [
            'id' => self::MUC_DO_MAT,
            'name' => 'Mật',
            'color' => '0xFF9575CD'
        ],
    ];

    protected $table = 'thong_bao';
    protected $fillable = [
        'slug',
        'tieu_de',
        'chi_nhanh_ids',
        'phong_ban_ids',
        'nhom_nguoi_nhan_ids',
        'nguoi_nhan_ids',
        'loai_thong_bao',
        'muc_do',
        'noi_dung',
        'dinh_kem',
        'xuat_ban',
        'nguoi_gui_id',
        'gui_tat_ca'
    ];

    protected $casts = [
        'chi_nhanh_ids' => 'array',
        'phong_ban_ids' => 'array',
        'nhom_nguoi_nhan_ids' => 'array',
        'nguoi_nhan_ids' => 'array',
        'dinh_kem' => 'array',
        'gui_tat_ca' => 'boolean',
        'xuat_ban' => 'boolean',
        'deleted_at' => 'datetime:Y-m-d H:i:s'
    ];

    public function userRead()
    {
        return $this->hasMany(ThongBaoUser::class, 'thong_bao_id', 'id');
    }

    public function loaiThongBao()
    {
        return $this->hasOne(LoaiThongBao::class, 'id', 'loai_thong_bao');
    }

    public function getIsReadAttribute()
    {
        $user = auth()->user();
        if (!$user) return false;

        return ThongBaoUser::query()
            ->where('user_id', $user->id)
            ->where('thong_bao_id', $this->id)
            ->where('status', ThongBaoUser::STATUS_DA_DOC)
            ->exists();
    }

    public function nguoiGui()
    {
        return $this->hasOne(User::class, 'id', 'nguoi_gui_id');
    }

    public function getSendFromAttribute()
    {
        $user = $this->nguoiGui;
        if (!$user) return 'Không xác định';

        $nhanVien = $user->nhanVien;
        if (!$nhanVien) return 'Không xác định';

        $sendFrom = $nhanVien->ho_ten;
        $phongBan = $nhanVien->phongBan;
        if ($phongBan) {
            $sendFrom = $sendFrom . ' - '. $phongBan->ten;
        }

        return $sendFrom;
    }
}
