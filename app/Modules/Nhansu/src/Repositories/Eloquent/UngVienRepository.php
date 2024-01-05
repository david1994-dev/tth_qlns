<?php

namespace App\Modules\Nhansu\src\Repositories\Eloquent;

use App\Modules\Nhansu\src\Models\UngVien;
use App\Modules\Nhansu\src\Repositories\Interface\UngVienRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Support\Arr;

class UngVienRepository extends BaseRepository implements UngVienRepositoryInterface
{
    protected array $querySearchTargets = ['ho_ten', 'email', 'dien_thoai', 'mauv'];
    public function getBlankModel()
    {
        return new UngVien();
    }

    public function renderMauv($ungVien)
    {
        $prefix = [
            UngVien::LOAI_UNG_VIEN_BAC_SI => 'BS',
            UngVien::LOAI_UNG_VIEN_DUOC_SI => 'DS',
            UngVien::LOAI_UNG_VIEN_VAN_PHONG => 'VP',
        ];

        return Arr::get($prefix, $ungVien->loai_ung_vien, '').'_'.base_convert($ungVien->id, 10, 36);
    }
}
