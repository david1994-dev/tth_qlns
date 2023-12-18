<?php

namespace App\Modules\Nhansu\src\Models;

class UserRole extends Base
{
    protected $table = 'user_roles';
    protected $fillable = [
        'role',
        'user_id',
    ];
}
