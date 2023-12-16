<?php

namespace App\Repositories\Eloquent;

use App\Models\UserRole;
use App\Repositories\Interface\UserRoleRepositoryInterface;

class UserRoleRepository extends BaseRepository implements UserRoleRepositoryInterface
{
    public function getBlankModel()
    {
        return new UserRole();
    }

    public function deleteByAdminUserId($id)
    {
        $records = $this->getByUserId($id);
        if( count($records) ) {
            foreach( $records as $record ) {
                $this->delete($record);
            }
        }

        return true;
    }

    public function setAdminUserRoles($userId, $roles)
    {
        $this->deleteByAdminUserId($userId);
        foreach ($roles as $role) {
            $this->create(
                [
                    'user_id' => $userId,
                    'role'          => $role,
                ]
            );
        }
    }
}
