<?php

namespace App\Modules\SuCoYKhoa\src\Repositories\Interface;

use App\Repositories\Interface\BaseRepositoryInterface;

interface BaoCaoSuCoYKhoaRepositoryInterface extends BaseRepositoryInterface
{
    public function renderMaBc($baoCao);
}
