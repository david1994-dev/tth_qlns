<?php

namespace App\Modules\Nhansu\src\Repositories\Interface;

use App\Repositories\Interface\BaseRepositoryInterface;

interface ThongBaoRepositoryInterface extends BaseRepositoryInterface
{
    public function countByType($user, $filter);
    public function taoThongBao($input, $receiveIds);
    public function getNotifications($user, $filter, $order, $direction, $offset, $limit);
    public function countNotifications($user, $filter);
}
