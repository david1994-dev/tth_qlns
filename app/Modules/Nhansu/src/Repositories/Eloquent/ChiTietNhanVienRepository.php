<?php

namespace App\Modules\Nhansu\src\Repositories\Eloquent;

use App\Modules\Nhansu\src\Models\ChiTietNhanVien;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interface\BaseRepositoryInterface;

class ChiTietNhanVienRepository extends BaseRepository implements BaseRepositoryInterface
{
    protected array $querySearchTargets = [];
    public function getBlankModel()
    {
        return new ChiTietNhanVien();
    }
}
