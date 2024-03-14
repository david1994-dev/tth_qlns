<?php

namespace App\Modules\Nhansu\src\Repositories\Eloquent;

use App\Modules\Nhansu\src\Models\LoaiThongBao;
use App\Modules\Nhansu\src\Repositories\Interface\LoaiThongBaoRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class LoaiThongBaoRepository extends BaseRepository implements LoaiThongBaoRepositoryInterface
{
    protected array $querySearchTargets = ['ten'];
    public function getBlankModel()
    {
        return new LoaiThongBao();
    }
}
