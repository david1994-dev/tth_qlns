<?php

namespace App\Repositories\Eloquent;

use App\Models\Base;
use App\Repositories\Interface\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

class BaseRepository implements BaseRepositoryInterface
{
    protected array $querySearchTargets = [];

    public function getEmptyList()
    {
        return new Collection();
    }

    public function getModelClassName(): string
    {
        $model = $this->getBlankModel();

        return get_class($model);
    }

    public function getBlankModel()
    {
        return new Base();
    }

    public function all(string $order = null, string $direction = null)
    {
        $model = $this->getModelClassName();
        if (!empty($order)) {
            $direction = empty($direction) ? 'asc' : $direction;

            return $model::query()->orderBy($order, $direction)->get();
        }

        return $model::query()->get();
    }

    public function get(string $order, string $direction, int $offset, int $limit)
    {
        $model = $this->getModelClassName();

        return $model::query()->orderBy($order, $direction)->skip($offset)->take($limit)->get();
    }


    public function count(): int
    {
        $model = $this->getModelClassName();

        return $model::query()->count();
    }

    public function allByFilter(array $filter, string $order = null, string $direction = null)
    {
        $query = $this->buildQueryByFilter($this->getBlankModel(), $filter);
        $query = $this->buildOrder($query, $filter, $order, $direction);

        return $query->get();
    }

    public function getByFilter(array $filter, string $order, string $direction, int $offset, int $limit)
    {
        $query = $this->buildQueryByFilter($this->getBlankModel(), $filter);
        $query = $this->buildOrder($query, $filter, $order, $direction);

        return $query->skip($offset)->take($limit)->get();
    }

    public function countByFilter(array $filter)
    {
        $query = $this->buildQueryByFilter($this->getBlankModel(), $filter);

        return $query->count();
    }

    public function firstByFilter(array $filter)
    {
        $query = $this->buildQueryByFilter($this->getBlankModel(), $filter);

        return $query->first();
    }

    public function getSQLByFilter(array $filter)
    {
        $query = $this->buildQueryByFilter($this->getBlankModel(), $filter);

        return $query->toSql();
    }

    public function deleteByFilter(array $filter)
    {
        $query = $this->buildQueryByFilter($this->getBlankModel(), $filter);

        return $query->delete();
    }

    public function pluck($collection, $value, $key = null)
    {
        $items = [];
        foreach ($collection as $model) {
            if (empty($key)) {
                $items[] = $model->$value;
            } else {
                $items[ $model->$key ] = $model->$value;
            }
        }

        return Collection::make($items);
    }

    public function create($input)
    {
        return $this->getBlankModel()->create($input);
    }

    public function findById($id)
    {
        return $this->getBlankModel()->find($id);
    }

    /**
     * @param \Illuminate\Database\Query\Builder $query
     * @param array                              $filter
     *
     * @return \Illuminate\Database\Query\Builder
     */
    protected function buildQueryByFilter($query, $filter)
    {
        $tableName = $this->getBlankModel()->getTable();

        $query = $this->queryOptions($query);

        if (count($this->querySearchTargets) > 0 && array_key_exists('query', $filter)) {
            $searchWord = Arr::get($filter, 'query');
            if (!empty($searchWord)) {
                $query = $query->where(function($q) use ($searchWord) {
                    foreach ($this->querySearchTargets as $index => $target) {
                        if ($index === 0) {
                            $q = $q->where($target, 'LIKE', '%'.$searchWord.'%');
                        } else {
                            $q = $q->orWhere($target, 'LIKE', '%'.$searchWord.'%');
                        }
                    }
                });
            }
            unset($filter['query']);
        }

        if(array_key_exists('whereNotIn', $filter)) {
            $params = Arr::get($filter, 'whereNotIn');
            foreach ($params as $column => $values) {
                if (is_array($values)) {
                    $query = $query->whereNotIn($tableName.'.'.$column, $values);
                }
            }

            unset($filter['whereNotIn']);
        }

        foreach ($filter as $column => $value) {
            if (is_array($value)) {
                $query = $query->whereIn($tableName.'.'.$column, $value);
            } else {
                $query = $query->where($tableName.'.'.$column, $value);
            }
        }

        return $query;
    }

    /**
     * @param \Illuminate\Database\Query\Builder $query
     * @param array                              $filter
     * @param string                             $order
     * @param string                             $direction
     *
     * @return \Illuminate\Database\Query\Builder
     */
    protected function buildOrder($query, $filter, $order, $direction)
    {
        if (!empty($order)) {
            $direction = empty($direction) ? 'asc' : $direction;
            $query     = $query->orderBy($order, $direction);
        }

        return $query;
    }

    /**
     * @param \Illuminate\Database\Query\Builder $query
     *
     * @return \Illuminate\Database\Query\Builder
     */
    protected function queryOptions($query)
    {
        return $query;
    }
}
