<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Modules\Nhansu\src\Models\NhanVien;
use App\Modules\Nhansu\src\Models\NhomNhanSu;
use App\Modules\Nhansu\src\Models\ThongBao;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'last_notification_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function nhanVien()
    {
        return $this->hasOne(NhanVien::class, 'user_id', 'id');
    }

    public function roles()
    {
        return $this->hasMany(UserRole::class, 'user_id', 'id');
    }

    /**
     * @param string $targetRole
     * @param bool $checkSubRoles
     *
     * @return bool
     */
    public function hasRole(string $targetRole, bool $checkSubRoles = true): bool
    {
        $roles = [];
        foreach ($this->roles as $role) {
            $roles[] = $role->role;
        }

        if (in_array($targetRole, $roles)) {
            return true;
        }

        if (!$checkSubRoles) {
            return false;
        }

        $roleConfigs = config('user_roles.roles', []);
        foreach ($roles as $role) {
            $subRoles = Arr::get($roleConfigs, "$role.sub_roles", []);
            if (in_array($targetRole, $subRoles)) {
                return true;
            }
        }

        return false;
    }

    public function thongBao()
    {
        return $this->belongsToMany(User::class, 'thong_bao_users', 'user_id', 'thong_bao_id');
    }

    public function getNhomNhanSuAttribute()
    {
        return NhomNhanSu::query()->whereJsonContains('user_ids', (string)$this->id)->pluck('id')->toArray();
    }
}
