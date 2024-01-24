<?php

namespace App\Modules\Nhansu\src\Models;

use App\Models\Base;
use App\Models\User;

class LoaiNhanVien extends Base
{
    protected $table = 'loai_nhan_vien';

    public function user()
    {
        return $this->hasOne(User::class, 'nguoi_cap_nhat_id', 'id');
    }

    protected $fillable = ['ten', 'nguoi_cap_nhat_id'];
}
