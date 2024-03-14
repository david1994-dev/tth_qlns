<?php

namespace App\Modules\Nhansu\Helpers;

use App\Modules\Nhansu\src\Models\ThongBao;
use App\Modules\Nhansu\src\Models\ThongBaoUser;
use Illuminate\Support\Facades\DB;

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

        $nhomNhanSu = $user->nhomNhanSu ?? [];
        $nhomNhanSuNhan = $notification->nhom_nguoi_nhan_ids ?? [];
        if (count(array_intersect($nhomNhanSu, $nhomNhanSuNhan))) {
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

        return false;
    }

    public static function groupThongBaoChuaDoc($user)
    {
        $nhanVien = $user->nhanVien;
        $nhomNhanSu = $user->nhomNhanSu;
        $status = ThongBaoUser::STATUS_DA_DOC;
        $query = ThongBao::query()
            ->where('thong_bao.id', '>', $user->last_notification_id)
            ->where('thong_bao.xuat_ban', true)
            ->where(function ($q) use ($nhanVien, $nhomNhanSu) {
                $q->where('thong_bao.gui_tat_ca', true)
                    ->orWhere(function ($q) use ($nhanVien, $nhomNhanSu) {
                        $q->whereJsonContains('thong_bao.chi_nhanh_ids', $nhanVien->chi_nhanh_id)
                            ->orWhereJsonContains('thong_bao.phong_ban_ids', $nhanVien->phong_ban_id)
                            ->orWhereJsonContains('thong_bao.nguoi_nhan_ids', $nhanVien->user_id);
                        foreach ($nhomNhanSu as $nnsId) {
                            $q->orWhereJsonContains('thong_bao.nhom_nguoi_nhan_ids', $nnsId);
                        }
                    });
            })

            ->whereNotExists(function ($qr) use ($user, $status) {
                $qr->select(DB::raw(1))
                    ->from('thong_bao_users')
                    ->whereRaw('thong_bao_users.user_id = '.$user->id)
                    ->whereRaw('thong_bao_users.status = '.$status)
                    ->whereRaw('thong_bao.id = thong_bao_users.thong_bao_id');
            });


        return $query->select('thong_bao.loai_thong_bao', DB::raw('count(*) as total'))
            ->groupBy('thong_bao.loai_thong_bao')
            ->pluck('total', 'loai_thong_bao')
            ->toArray();
    }

    public static function getPDFFile($thongBao)
    {
        if (empty($thongBao->dinh_kem)) return null;

        foreach ($thongBao->dinh_kem as $file) {
            $extension = pathinfo(asset('storage/' . $file), PATHINFO_EXTENSION);
            if ($extension == 'pdf') {
                return asset('storage/' . $file);
            }
        }

        return null;
    }
}
