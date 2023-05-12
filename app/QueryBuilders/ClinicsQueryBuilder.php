<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Subjects\Clinic;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class ClinicsQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Clinic::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getClinicById(int $id): Collection
    {
        return Clinic::query()->where('id', $id)->get();
    }

    public function getClinicsWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }
}
