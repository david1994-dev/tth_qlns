<?php

namespace App\Modules\Nhansu\src\Repositories\Eloquent;

use App\Modules\Nhansu\src\Models\ThongBao;
use App\Modules\Nhansu\src\Repositories\Interface\ThongBaoRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Support\Facades\DB;

class ThongBaoRepository extends BaseRepository implements ThongBaoRepositoryInterface
{
    protected array $querySearchTargets = ['title'];
    public function getBlankModel()
    {
        return new ThongBao();
    }

    public function countByType($user, $filter)
    {
        $query = $this->buildQuery($user, $filter);

        return $query->select('loai_thong_bao', DB::raw('count(*) as total'))
            ->groupBy('loai_thong_bao')
            ->pluck('total', 'loai_thong_bao')->toArray();
    }

    public function taoThongBao($input, $receiveIds)
    {
        if (!count($receiveIds)) {
            $input['receive_id'] = 0;
            return $this->create($input);
        }

        $inputs = [];
        foreach ($receiveIds as $receiveId) {
            $input['receive_id'] = $receiveId;
            $inputs[] = $input;
        }

        return $this->insert($inputs);
    }

    private function buildQuery($user, $filter, $order=null, $direction=null, $offset=null, $limit=null)
    {
        //todo filter
        $nhanVien = $user->nhanVien;
        $query = $this->getBlankModel()
            ->where('id', '>', $user->last_notification_id)
            ->where('xuat_ban', true)
            ->where(function ($qr) use ($nhanVien) {
                $qr->where('gui_tat_ca', true)
                    ->orWhere(function ($q) use ($nhanVien) {
                        $q->whereJsonContains('chi_nhanh_ids', $nhanVien->chi_nhanh_id)
                            ->orWhereJsonContains('phong_ban_ids', $nhanVien->phong_ban_id)
                            ->orWhereJsonContains('phong_ban_ids', $nhanVien->phong_ban_id)
                            ->orWhereJsonContains('nguoi_nhan_ids', $nhanVien->user_id);
                    });
            });

        if ($order && $direction) {
            $query = $query->orderBy($order, $direction);
        }

        if ($offset && $limit) {
            $query = $query->skip($offset)->take($limit);
        }

        return $query;
    }

    public function getNotifications($user, $filter, $order, $direction, $offset, $limit)
    {
        return $this->buildQuery($user, $filter, $order, $direction, $offset, $limit)->get();
    }

    public function countNotifications($user, $filter)
    {
        return $this->buildQuery($user, $filter)->count();
    }
}
