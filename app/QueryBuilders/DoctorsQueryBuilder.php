<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Subjects\Doctor;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class DoctorsQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Doctor::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getDoctorById(int $id): Collection
    {
        return Doctor::query()->where('id', $id)->get();
    }

    public function getDoctorsWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }
}
