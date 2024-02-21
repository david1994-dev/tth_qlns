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
        self::MUC_DO_BINH_THUONG => 'Bình Thường',
        self::MUC_DO_KHAN => 'Khẩn',
        self::MUC_DO_MAT => 'Mật'
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
        'nguoi_gui_id'
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

        $userId = $user->id;
        $status = ThongBaoUser::STATUS_DA_DOC;
        return $this->userRead->contains(function ($val, $key) use ($userId, $status) {
            return $val->user_id == $userId && $val->status == $status;
        });
    }

    public function nguoiGui()
    {
        return $this->hasOne(User::class, 'id', 'nguoi_gui_id');
    }
}
