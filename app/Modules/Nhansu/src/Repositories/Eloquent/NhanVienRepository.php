<?php

namespace App\Modules\Nhansu\src\Repositories\Eloquent;

use App\Modules\Nhansu\src\Models\NhanVien;
use App\Modules\Nhansu\src\Repositories\Interface\NhanVienRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class NhanVienRepository extends BaseRepository implements NhanVienRepositoryInterface
{
    protected array $querySearchTargets = ['ho_ten', 'email', 'ma'];
    public function getBlankModel()
    {
        return new NhanVien();
    }
}
