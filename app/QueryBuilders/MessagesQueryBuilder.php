<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Message;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class MessagesQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Message::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getMessageById(int $id): Collection
    {
        return Message::query()->where('id', $id)->get();
    }

    public function getMessagesWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }
}
