<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface BaseRepositoryInterface
{
	public function index(array $params): LengthAwarePaginator;

	public function show(int $id): ?Model;

	public function store(array $data): ?Model;

    public function update(Model $model, array $data): bool;

    public function destroy(Model $model): bool|null;
}
