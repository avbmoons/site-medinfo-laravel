<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Subjects\Patient;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class PatientsQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Patient::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getPatientById(int $id): Collection
    {
        return Patient::query()->where('id', $id)->get();
    }

    public function getPatientsWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }
}
