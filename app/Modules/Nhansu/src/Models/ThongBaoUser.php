<?php

namespace App\Modules\Nhansu\src\Models;

use App\Models\Base;
use Illuminate\Database\Eloquent\SoftDeletes;

class ThongBaoUser extends Base
{
    const STATUS_CHUA_DOC = 1;
    const STATUS_DA_DOC = 2;

    protected $table = 'thong_bao_users';
    protected $fillable = [
        'user_id',
        'thong_bao_id',
        'status',
    ];

    protected $casts = [
        'deleted_at' => 'datetime:Y-m-d H:i:s'
    ];
}
