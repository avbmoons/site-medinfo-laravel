<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Documents\Receipt;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class ReceiptsQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Receipt::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getReceiptById(int $id): Collection
    {
        return Receipt::query()->where('id', $id)->get();
    }

    public function getReceiptsWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }
    public function getReceiptsByDrugId(int $drugId): Collection
    {
        return Receipt::query()->where('drug_id', $drugId)->get();
    }
}
