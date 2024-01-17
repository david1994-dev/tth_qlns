<?php

namespace App\Modules\Nhansu\src\Repositories\Interface;

use App\Repositories\Interface\BaseRepositoryInterface;

interface SoDoToChucRepositoryInterface extends BaseRepositoryInterface
{
    public function deleteChild($model);
}
