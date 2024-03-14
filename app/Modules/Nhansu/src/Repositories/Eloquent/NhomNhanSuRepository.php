<?php

namespace App\Modules\Nhansu\src\Repositories\Eloquent;

use App\Modules\Nhansu\src\Models\NhomNhanSu;
use App\Modules\Nhansu\src\Repositories\Interface\NhomNhanSuRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class NhomNhanSuRepository extends BaseRepository implements NhomNhanSuRepositoryInterface
{
    protected array $querySearchTargets = ['ten', 'user_ids'];
    public function getBlankModel()
    {
        return new NhomNhanSu();
    }
}
