<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Speciality;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class SpecialitiesQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Speciality::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getSpecialityById(int $id): Collection
    {
        return Speciality::query()->where('id', $id)->get();
    }

    public function getSpecialitiesWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }
}
