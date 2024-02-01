<?php

namespace App\Modules\Nhansu\src\Models;

use App\Models\Base;
use App\Models\User;

class ThongBao extends Base
{
    const TYPE_CONG_VAN = 1;

    const STATUS_KHAN = 1;

    const RECEIVE_ALL = 0;

    protected $table = 'thong_bao';
    protected $fillable = [
       'receive_id',
        'title',
        'content',
        'images',
        'creator_id',
        'status'
    ];

    protected $casts = [
        'images' => 'array'
    ];

    public function userRead()
    {
        return $this->hasMany(ThongBaoUser::class, 'thong_bao_id', 'id');
    }

    public function getIsReadAttribute()
    {
        $user = auth()->user();
        if (!$user) return false;

        $userId = $user->id;
        $status = ThongBaoUser::STATUS_DA_DOC;
        return $this->userRead->contains(function ($val, $key) use ($userId, $status) {
            return $val->user_id == $userId && $val->status == $status;
        });
    }

    public function creator()
    {
        return $this->hasOne(User::class, 'id', 'creator_id');
    }
}
