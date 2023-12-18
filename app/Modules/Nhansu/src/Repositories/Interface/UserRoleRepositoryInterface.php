<?php

namespace App\Modules\Nhansu\src\Repositories\Interface;

use App\Repositories\Interface\BaseRepositoryInterface;

interface UserRoleRepositoryInterface extends BaseRepositoryInterface
{
    public function deleteByAdminUserId($id);
    public function setAdminUserRoles($userId, $roles);
}
