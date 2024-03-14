<?php

namespace App\Modules\Nhansu\src\Repositories\Interface;

use App\Repositories\Interface\BaseRepositoryInterface;

interface NhanVienRepositoryInterface extends BaseRepositoryInterface
{
    public function countByType();
    public function renderMaNv($id);
}
