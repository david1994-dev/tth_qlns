<?php

namespace App\Models;

class UserRole extends Base
{
    protected $table = 'user_roles';
    protected $fillable = [
        'role',
        'user_id',
    ];
}
