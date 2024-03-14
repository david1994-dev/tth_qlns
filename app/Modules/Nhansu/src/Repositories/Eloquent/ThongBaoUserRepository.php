<?php

namespace App\Modules\Nhansu\src\Repositories\Eloquent;

use App\Modules\Nhansu\src\Models\ThongBaoUser;
use App\Modules\Nhansu\src\Repositories\Interface\ThongBaoUserRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class ThongBaoUserRepository extends BaseRepository implements ThongBaoUserRepositoryInterface
{
    protected array $querySearchTargets = [];
    public function getBlankModel()
    {
        return new ThongBaoUser();
    }

    public function firstOrCreate($params)
    {
        return ThongBaoUser::query()->firstOrCreate($params);
    }
}
