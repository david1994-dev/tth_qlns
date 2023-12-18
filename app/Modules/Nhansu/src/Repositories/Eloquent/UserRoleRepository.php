<?php

namespace App\Modules\Nhansu\src\Repositories\Eloquent;

use App\Modules\Nhansu\src\Models\UserRole;
use App\Modules\Nhansu\src\Repositories\Interface\UserRoleRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

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
