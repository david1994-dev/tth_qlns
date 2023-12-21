<?php

namespace App\Modules\Nhansu\src\Repositories\Eloquent;

use App\Modules\Nhansu\src\Models\PhongBan;
use App\Modules\Nhansu\src\Repositories\Interface\PhongBanRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class PhongBanRepository extends BaseRepository implements PhongBanRepositoryInterface
{
    protected array $querySearchTargets = ['ma', 'ten'];
    public function getBlankModel()
    {
        return new PhongBan();
    }
}
