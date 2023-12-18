<?php

namespace App\Modules\Nhansu\src\Repositories\Eloquent;

use App\Modules\Nhansu\src\Models\User;
use App\Modules\Nhansu\src\Repositories\Interface\UserRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected array $querySearchTargets = ['email', 'name'];
    public function getBlankModel()
    {
        return new User();
    }
}
