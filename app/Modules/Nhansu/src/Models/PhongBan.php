<?php

namespace App\Modules\Nhansu\src\Models;

use App\Models\Base;

class PhongBan extends Base
{
    protected $table = 'phongban';
    const LOAI_CHUYEN_MON = 1;
    const LOAI_CHUC_NANG = 2;
    protected $fillable = [
        'ma',
        'ten',
        'chi_nhanh_id',
        'nguoi_cap_nhat_id',
        'dinhBien',
        'sapXep',
        'trangThai',
        'loai'
    ];
}
