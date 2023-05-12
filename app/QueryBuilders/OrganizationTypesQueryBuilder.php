<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\OrganizationType;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class OrganizationTypesQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = OrganizationType::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getOrganizationTypeById(int $id): Collection
    {
        return OrganizationType::query()->where('id', $id)->get();
    }

    public function getOrganizationTypesWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }
}
