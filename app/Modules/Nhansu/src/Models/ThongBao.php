<?php

namespace App\Modules\Nhansu\src\Models;

use App\Models\Base;
use App\Models\User;

class ThongBao extends Base
{
    const TYPE_CONG_VAN = 1;

    protected $table = 'thong_bao';
    protected $fillable = [
       'receive_id',
        'title',
        'content',
        'images'
    ];

    protected $casts = [
        'images' => 'array'
    ];

    public function user()
    {
        return $this->belongsToMany(User::class, 'thong_bao_users', 'thong_bao_id', 'user_id');
    }
}
