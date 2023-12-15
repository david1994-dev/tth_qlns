<?php

namespace App\Models;

class Employee extends Base
{
    protected $guarded = [];

    protected $casts = [
        'chitiet' => 'array',
    ];
}
