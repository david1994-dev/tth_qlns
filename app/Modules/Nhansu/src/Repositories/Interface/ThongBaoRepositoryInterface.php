<?php

namespace App\Modules\Nhansu\src\Repositories\Interface;

use App\Repositories\Interface\BaseRepositoryInterface;

interface ThongBaoRepositoryInterface extends BaseRepositoryInterface
{
    public function countByType($user, $lastId);
    public function taoThongBao($input, $receiveIds);
}
