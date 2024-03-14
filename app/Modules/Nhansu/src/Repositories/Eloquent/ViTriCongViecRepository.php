<?php

namespace App\Modules\Nhansu\src\Repositories\Eloquent;

use App\Modules\Nhansu\src\Models\ViTriCongViec;
use App\Modules\Nhansu\src\Repositories\Interface\ViTriCongViecRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class ViTriCongViecRepository extends BaseRepository implements ViTriCongViecRepositoryInterface
{
    protected array $querySearchTargets = ['ten'];
    public function getBlankModel()
    {
        return new ViTriCongViec();
    }
}
