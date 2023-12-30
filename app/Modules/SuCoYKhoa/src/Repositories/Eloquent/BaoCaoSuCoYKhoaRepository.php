<?php

namespace App\Modules\SuCoYKhoa\src\Repositories\Eloquent;

use App\Modules\SuCoYKhoa\src\Models\BaoCaoSuCoYKhoa;
use App\Modules\SuCoYKhoa\src\Repositories\Interface\BaoCaoSuCoYKhoaInterface;
use App\Repositories\Eloquent\BaseRepository;

class BaoCaoSuCoYKhoaRepository extends BaseRepository implements BaoCaoSuCoYKhoaInterface
{
    protected array $querySearchTargets = ['ma', 'ho_ten_nguoi_benh'];
    public function getBlankModel()
    {
        return new BaoCaoSuCoYKhoa();
    }
}
