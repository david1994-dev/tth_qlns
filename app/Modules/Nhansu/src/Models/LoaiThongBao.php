<?php

namespace App\Modules\Nhansu\src\Models;

use App\Models\Base;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoaiThongBao extends Base
{
    use SoftDeletes;

    protected $table = 'loai_thong_bao';
    protected $fillable = [
        'nguoi_tao_id',
        'ten',
        'icon'
    ];

    protected $casts = [
        'deleted_at' => 'datetime:Y-m-d H:i:s'
    ];

    public function thongBao()
    {
        return $this->hasMany(ThongBao::class, 'loai_thong_bao', 'id');
    }
}
