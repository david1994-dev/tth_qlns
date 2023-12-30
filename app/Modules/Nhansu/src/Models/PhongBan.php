<?php

namespace App\Modules\Nhansu\src\Models;

use App\Models\Base;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhongBan extends Base
{
    use SoftDeletes;

    protected $table = 'phongban';
    const LOAI_CHUYEN_MON = 1;
    const LOAI_CHUC_NANG = 2;
    protected $fillable = [
        'ma',
        'ten',
        'chi_nhanh_id',
        'nguoi_cap_nhat_id',
        'dinh_bien',
        'sap_xep',
        'trang_thai',
        'loai'
    ];

    protected $casts = [
        'deleted_at' => 'datetime:Y-m-d H:i:s'
    ];

}
