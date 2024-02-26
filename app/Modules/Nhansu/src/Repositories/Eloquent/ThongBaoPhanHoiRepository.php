<?php

namespace App\Modules\Nhansu\src\Repositories\Eloquent;

use App\Modules\Nhansu\src\Models\ThongBaoPhanHoi;
use App\Modules\Nhansu\src\Repositories\Interface\ThongBaoPhanHoiRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class ThongBaoPhanHoiRepository extends BaseRepository implements ThongBaoPhanHoiRepositoryInterface
{
    protected array $querySearchTargets = [];

    public function getBlankModel()
    {
        return new ThongBaoPhanHoi();
    }
}
