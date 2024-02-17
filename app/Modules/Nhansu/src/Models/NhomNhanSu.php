<?php

namespace App\Modules\Nhansu\src\Models;

use App\Models\Base;
use Illuminate\Database\Eloquent\SoftDeletes;

class NhomNhanSu extends Base
{
    use SoftDeletes;


    protected $table = 'nhansu_nhom';
    protected $fillable = [
        'ten',
        'user_ids',
    ];

    protected $casts = [
        'deleted_at' => 'datetime:Y-m-d H:i:s',
        'user_ids' => 'array'
    ];
}
