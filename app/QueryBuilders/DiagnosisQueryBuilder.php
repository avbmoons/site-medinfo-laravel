<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Diagnosis;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class DiagnosisQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Diagnosis::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getDiagnosisById(int $id): Collection
    {
        return Diagnosis::query()->where('id', $id)->get();
    }

    public function getDiagnosisWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }
}
