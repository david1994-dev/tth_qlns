<?php

namespace App\Repositories\Eloquent;

use App\Models\Base;
use App\Models\User;
use App\Repositories\Interface\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected array $querySearchTargets = ['email', 'name'];
    public function getBlankModel()
    {
        return new User();
    }

    public function createAccount($input)
    {
        $account = $this->getBlankModel()->query()->create($input);
        if (!$account) return false;

        $account->last_notification_id = DB::table('thong_bao')->max('id');
        $account->save();

        return $account;
    }
}
