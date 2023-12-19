<?php

namespace App\Modules\Nhansu\src\Models;

use App\Models\Base;

class Employee extends Base
{
    protected $table = 'nhanvien';
    protected $guarded = [];

    protected $casts = [
        'chitiet' => 'array',
    ];
}
