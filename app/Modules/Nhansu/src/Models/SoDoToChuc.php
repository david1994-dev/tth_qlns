<?php

namespace App\Modules\Nhansu\src\Models;

use App\Models\Base;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class SoDoToChuc extends Base
{
    use SoftDeletes;

    protected $table = 'so_do_to_chuc';
    protected $fillable = [
        'phong_ban_id',
        'chi_nhanh_id',
        'ma_vi_tri',
        'parent_id',
        'nguoi_cap_nhat_id',
    ];

    protected $casts = [
        'deleted_at' => 'datetime:Y-m-d H:i:s'
    ];

    public function chiNhanh()
    {
        return $this->belongsTo(ChiNhanh::class, 'chi_nhanh_id', 'id');
    }

    public function phongBan()
    {
        return $this->belongsTo(PhongBan::class, 'phong_ban_id', 'id');
    }

    public function nguoiCapNhat()
    {
        return $this->belongsTo(User::class, 'nguoi_cap_nhat_id', 'id');
    }

    public function childs()
    {
        return $this->hasMany(SoDoToChuc::class, 'parent_id', 'id');
    }
}
