<?php

namespace App\Modules\SuCoYKhoa\src\Models;

use App\Models\Base;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaoCaoSuCoYKhoa extends Base
{
    use SoftDeletes;

    const STATUS_UNDER_REVIEW = 0;
    const STATUS_PROCESSING = 1;

    protected $table = 'bao_cao_su_co_y_khoa';
    protected $fillable = [
        'ma',
        'ho_ten_nguoi_benh',
        'ngay_bao_cao',
        'ngay_su_co',
        'khoa_phong_ban_id',
        'chi_nhanh_id',
        'mo_ta',
        'de_xuat_giai_phap',
        'giai_phap_da_thuc_hien',
        'ho_ten_nguoi_bao_cao',
        'chi_tiet',
        'muc_do',
        'images'
    ];

    protected $casts = [
        'chi_tiet' => 'array',
        'images' => 'array',
        'ngay_bao_cao' => 'date:Y-m-d',
        'ngay_su_co' => 'datetime:Y-m-d H:i:s',
        'deleted_at' => 'datetime:Y-m-d H:i:s'
    ];
}
