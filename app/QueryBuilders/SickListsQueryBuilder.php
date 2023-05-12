<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Diagnosis;
use App\Models\Documents\SickList;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class SickListsQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = SickList::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getSickListById(int $id): Collection
    {
        return SickList::query()->where('id', $id)->get();
    }

    public function getSickListWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }
}
