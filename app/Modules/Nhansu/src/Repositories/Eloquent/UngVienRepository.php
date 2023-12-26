<?php

namespace App\Modules\Nhansu\src\Repositories\Eloquent;

use App\Modules\Nhansu\src\Models\UngVien;
use App\Modules\Nhansu\src\Repositories\Interface\UngVienRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class UngVienRepository extends BaseRepository implements UngVienRepositoryInterface
{
    protected array $querySearchTargets = ['ho_ten', 'email', 'dien_thoai', 'mauv'];
    public function getBlankModel()
    {
        return new UngVien();
    }
}
