<?php

namespace App\Models;

class Employee extends Base
{
    protected $table = 'nhanvien';
    protected $guarded = [];

    protected $casts = [
        'chitiet' => 'array',
    ];
}
