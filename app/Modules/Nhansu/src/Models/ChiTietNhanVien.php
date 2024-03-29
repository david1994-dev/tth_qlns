<?php

namespace App\Modules\Nhansu\src\Models;

use App\Models\Base;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChiTietNhanVien extends Base
{
    use SoftDeletes;

    const TRINH_DO_CHUYEN_MON = [
        1 => 'Đại Học',
        2 => 'Cao Đẳng',
        3 => 'Trung Cấp'
    ];

    const TINH_TRANG_DOC_THAN = 1;
    const TINH_TRANG_CO_GIA_DINH = 2;

    const TINH_TRANG_HON_NHAN = [
        self::TINH_TRANG_DOC_THAN => 'Độc Thân',
        self::TINH_TRANG_CO_GIA_DINH => 'Đã Lập Gia Đình'
    ];

    const DAN_TOC = [
        'Kinh' => 'Kinh',
        'Mèo' => 'Mèo',
        'Mường' => 'Mường',
    ];

    protected $table = 'nhanvien_chitiet';

    protected $fillable = [
        'nhan_vien_id',
        'que_quan',
        'dan_toc',
        'ton_giao',
        'dia_chi_thuong_tru',
        'dia_chi_tam_tru',
        'ma_so_thue',
        'dien_thoai_ca_nhan',
        'tinh_trang_hon_nhan',
        'email_phu',
        'ngay_bat_dau_lam_viec',
        'ngay_ket_thuc_lam_viec',
        'ngay_thuc_te_lam_viec',
        'cmnd',
        'ngay_cap_cmnd',
        'noi_cap_cmnd',
        'trinh_do_chuyen_mon',
        'so_cchn',
        'bo_sung_pham_vi_cm',
        'ngay_cap_cchn',
        'dang_ki_hanh_nghe_hien_tai',
        'bien_oto',
        'bien_xe_may',
        'size_quan',
        'size_ao',
        'size_giay_dep',
        'bang_lai',
    ];

    protected $casts = [
        'deleted_at' => 'datetime:Y-m-d H:i:s',
        'ngay_bat_dau_lam_viec' => 'date',
        'ngay_ket_thuc_lam_viec' => 'date',
        'ngay_thuc_te_lam_viec' => 'date',
        'ngay_cap_cmnd' => 'date',
        'ngay_cap_cchn' => 'date',
    ];
}
