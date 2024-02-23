<?php

namespace App\Modules\Nhansu\Helpers;

use App\Modules\Nhansu\src\Models\ThongBaoUser;

class ThongBaoHelper
{
    public static function userCanReadNotification($user, $notification)
    {
        if (!$notification->xuat_ban) {
            return false;
        }

        if ($notification->gui_tat_ca) {
            return true;
        }

        $nguoiNhanIds = $notification->nguoi_nhan_ids ?? [];
        if (in_array($user->id, $nguoiNhanIds)) {
            return true;
        }

        $nhanVien = $user->nhanVien;

        $phongBan = $notification->phong_ban_ids ?? [];
        if (in_array($nhanVien->phong_ban_id, $phongBan)) {
            return true;
        }

        $chiNhanh = $notification->chi_nhanh_ids ?? [];
        if (in_array($nhanVien->chi_nhanh_id, $chiNhanh)) {
            return true;
        }

        $nhomNhanSu = $user->nhomNhanSu ?? [];
        $nhomNhanSuNhan = $notification->nhom_nguoi_nhan_ids ?? [];
        if (count(array_intersect($nhomNhanSu, $nhomNhanSuNhan))) {
            return true;
        }

        return false;
    }
}
