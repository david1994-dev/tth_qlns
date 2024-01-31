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

    public function countByType($user, $lastId)
    {
        return DB::table('thong_bao')
            ->where('id', '>', $lastId)
            ->whereIn('receive_id', [ThongBao::RECEIVE_ALL, $user->id])
            ->select('type', DB::raw('count(*) as total'))
            ->groupBy('type')
            ->pluck('total', 'type')->toArray();
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
}
