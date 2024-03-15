<?php

namespace App\Modules\Nhansu\src\Repositories\Eloquent;

use App\Modules\Nhansu\src\Models\LoaiThongBao;
use App\Modules\Nhansu\src\Models\ThongBao;
use App\Modules\Nhansu\src\Models\ThongBaoUser;
use App\Modules\Nhansu\src\Repositories\Interface\ThongBaoRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ThongBaoRepository extends BaseRepository implements ThongBaoRepositoryInterface
{
    protected array $querySearchTargets = ['title'];
    public function getBlankModel()
    {
        return new ThongBao();
    }

    public function countUnReadByType($user, $filter)
    {
        $nhanVien = $user->nhanVien;
        $nhomNhanSu = $user->nhomNhanSu;
        $status = ThongBaoUser::STATUS_DA_DOC;
        $query = $this->getBlankModel()
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

    public function getNotifications($user, $filter, $order, $direction, $offset, $limit)
    {
        $userId = $user->id;
        $stRead = ThongBaoUser::STATUS_DA_DOC;
        $query = $this->baseQuery($user, $filter);

        $query->select([
                'thong_bao.*',
                DB::raw("EXISTS (SELECT 1 FROM thong_bao_users WHERE thong_bao.id = thong_bao_users.thong_bao_id AND thong_bao_users.user_id = $userId AND thong_bao_users.status = $stRead) AS isRead")
            ]);

        if ($order && $direction) {
            $query = $query->orderBy('thong_bao.'.$order, $direction);
        }

        return $query->skip($offset)->take($limit)->get();
    }

    public function countNotifications($user, $filter)
    {
        return $this->baseQuery($user, $filter)->count();
    }

    private function baseQuery($user, $filter)
    {
        $nhanVien = $user->nhanVien;
        $nhomNhanSu = $user->nhomNhanSu;
        $query = $this->getBlankModel()
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
            });

        if (!empty($filter['category'])) {
            $query = $query->where('thong_bao.loai_thong_bao', $filter['category']);
        }

        if (!empty($filter['created_at_from'])) {
            $query = $query->where('thong_bao.created_at', '>=', Carbon::parse($filter['created_at_from']));
        }

        if (!empty($filter['created_at_to'])) {
            $query = $query->where('thong_bao.created_at', '<=', Carbon::parse($filter['created_at_to']));
        }

        if (!empty($filter['query'])) {
            $query = $query->where('thong_bao.tieu_de', 'LIKE', '%'.$filter['query'].'%');
        }

        return $query;
    }
}
