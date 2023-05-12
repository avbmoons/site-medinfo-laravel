<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Drug;
use App\Models\Subjects\Pharmacy;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;


final class DrugsQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Drug::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getDrugById(int $id): Collection
    {
        return Drug::query()->where('id', $id)->get();
    }

    public function getDrugsWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }

    public function getPharmaciesByDrugId(int $drugId): \Illuminate\Support\Collection
    {
        return $drugs = DB::table('drugs')
            ->leftjoin('receipts', 'receipts.drug_id', '=', 'drugs.id')
            ->leftjoin('pharmacies', 'pharmacies.id', '=', 'drugs.pharmacies_id')
            ->select('drugs.name', 'pharmacies.address')
            ->get();
    }
}
