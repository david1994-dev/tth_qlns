<?php

namespace App\Modules\Nhansu\src\Repositories\Eloquent;

use App\Modules\Nhansu\src\Models\SoDoToChuc;
use App\Modules\Nhansu\src\Repositories\Interface\SoDoToChucRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class SoDoToChucRepository extends BaseRepository implements SoDoToChucRepositoryInterface
{
    protected array $querySearchTargets = [];
    public function getBlankModel()
    {
        return new SoDoToChuc();
    }

    public function deleteChild($model)
    {
        $ids = [$model->id];
        do {
            $query = $this->getBlankModel()
                ->query()
                ->whereIn('parent_id', $ids);

            $childIds = $query->clone()
                ->pluck('id')
                ->toArray();

            if (!count($childIds)) {
                break;
            }

            $query->delete();
            $ids = $childIds;

        } while(true);
    }
}
