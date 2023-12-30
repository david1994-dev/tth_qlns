<?php

namespace App\Modules\SuCoYKhoa\src\Models;

use App\Models\Base;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaoCaoSuCoYKhoa extends Base
{
    use SoftDeletes;

    protected $table = 'bao_cao_su_co_y_khoa';
    protected $fillable = [
        'ma',
        'ho_ten_nguoi_benh',
        'ngay_bao_cao',
        'ngay_su_co',
        'thoi_gian_su_co',
        'khoa_phong_su_co',
        'mo_ta',
        'de_xuat_giai_phap',
        'giai_phap_da_thuc_hien',
        'chi_tiet'
    ];

    protected $casts = [
        'chi_tiet' => 'array',
        'ngay_bao_cao' => 'date:Y-m-d',
        'ngay_su_co' => 'date:Y-m-d',
        'deleted_at' => 'datetime:Y-m-d H:i:s'
    ];
}
