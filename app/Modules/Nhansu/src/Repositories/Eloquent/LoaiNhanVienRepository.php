<?php

namespace App\Modules\Nhansu\src\Repositories\Eloquent;

use App\Modules\Nhansu\src\Models\LoaiNhanVien;
use App\Modules\Nhansu\src\Repositories\Interface\LoaiNhanVienRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class LoaiNhanVienRepository extends BaseRepository implements LoaiNhanVienRepositoryInterface
{
    protected array $querySearchTargets = ['ten'];

    public function getBlankModel()
    {
        return new LoaiNhanVien();
    }
}
