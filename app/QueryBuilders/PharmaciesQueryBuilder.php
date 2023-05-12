<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Subjects\Pharmacy;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class PharmaciesQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Pharmacy::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getPharmacyById(int $id): Collection
    {
        return Pharmacy::query()->where('id', $id)->get();
    }

    public function getPharmaciesWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }

    public function getPharmaciesByDrugId(int $drugId): Collection
    {
        return Pharmacy::query()->where('drug_id', $drugId)->get();
    }
}
