<?php

namespace App\Modules\Nhansu\src\Repositories\Interface;

use App\Repositories\Interface\BaseRepositoryInterface;

interface ThongBaoUserRepositoryInterface extends BaseRepositoryInterface
{
    public function firstOrCreate($params);
}
