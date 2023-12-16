<?php

namespace App\Repositories\Interface;

interface UserRoleRepositoryInterface extends BaseRepositoryInterface
{
    public function deleteByAdminUserId($id);
    public function setAdminUserRoles($userId, $roles);
}
