<?php

namespace App\Repositories\Eloquent;

use App\Models\Base;
use App\Models\User;
use App\Repositories\Interface\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected array $querySearchTargets = ['email', 'name'];
    public function getBlankModel()
    {
        return new User();
    }
}
