<?php

namespace App\Modules\Nhansu\src\Repositories\Eloquent;

use App\Modules\Nhansu\src\Models\LoaiNhanVien;
use App\Modules\Nhansu\src\Models\NhanVien;
use App\Modules\Nhansu\src\Repositories\Interface\NhanVienRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class NhanVienRepository extends BaseRepository implements NhanVienRepositoryInterface
{
    protected array $querySearchTargets = ['ho_ten', 'email', 'ma'];
    public function getBlankModel()
    {
        return new NhanVien();
    }

    public function countByType()
    {
        return  DB::table('nhanvien')
            ->select('loai_nhan_vien_id', DB::raw('count(*) as total'))
            ->groupBy('loai_nhan_vien_id')
            ->pluck('total', 'loai_nhan_vien_id')->toArray();
    }
}
