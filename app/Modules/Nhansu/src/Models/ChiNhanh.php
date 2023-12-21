<?php

namespace App\Modules\Nhansu\src\Models;

use App\Models\Base;

class ChiNhanh extends Base
{
    protected $table = 'chi_nhanh';
    protected $fillable = [
        'ma',
        'ten',
        'trangThai',
        'nguoi_cap_nhat_id',
    ];
}
