<?php

namespace App\Modules\Nhansu\src\Repositories\Eloquent;

use App\Modules\Nhansu\src\Models\ChiTietNhanVien;
use App\Modules\Nhansu\src\Repositories\Interface\ChiTietNhanVienRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interface\BaseRepositoryInterface;

class ChiTietNhanVienRepository extends BaseRepository implements ChiTietNhanVienRepositoryInterface
{
    protected array $querySearchTargets = [];
    public function getBlankModel()
    {
        return new ChiTietNhanVien();
    }
}
