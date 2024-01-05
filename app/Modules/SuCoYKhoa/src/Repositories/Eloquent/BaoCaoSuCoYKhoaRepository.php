<?php

namespace App\Modules\SuCoYKhoa\src\Repositories\Eloquent;

use App\Modules\SuCoYKhoa\src\Models\BaoCaoSuCoYKhoa;
use App\Modules\SuCoYKhoa\src\Repositories\Interface\BaoCaoSuCoYKhoaRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Support\Arr;

class BaoCaoSuCoYKhoaRepository extends BaseRepository implements BaoCaoSuCoYKhoaRepositoryInterface
{
    protected array $querySearchTargets = ['ma', 'ho_ten_nguoi_benh'];
    public function getBlankModel()
    {
        return new BaoCaoSuCoYKhoa();
    }

    public function renderMaBc($baoCao)
    {
        return 'BCSC_'.base_convert($baoCao->id, 10, 36);
    }
}
