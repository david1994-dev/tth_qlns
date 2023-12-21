<?php

namespace App\Modules\Nhansu\src\Repositories\Eloquent;

use App\Modules\Nhansu\src\Models\ChiNhanh;
use App\Modules\Nhansu\src\Repositories\Interface\ChiNhanhRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class ChiNhanhRepository extends BaseRepository implements ChiNhanhRepositoryInterface
{
    protected array $querySearchTargets = ['ma', 'ten'];
    public function getBlankModel()
    {
        return new ChiNhanh();
    }
}
