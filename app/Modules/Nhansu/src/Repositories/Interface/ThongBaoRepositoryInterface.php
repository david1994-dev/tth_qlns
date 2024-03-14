<?php

namespace App\Modules\Nhansu\src\Repositories\Interface;

use App\Repositories\Interface\BaseRepositoryInterface;

interface ThongBaoRepositoryInterface extends BaseRepositoryInterface
{
    public function countUnReadByType($user, $filter);
    public function getNotifications($user, $filter, $order, $direction, $offset, $limit);
    public function countNotifications($user, $filter);
}
