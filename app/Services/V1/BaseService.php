<?php

namespace App\Services\V1;

use App\Repositories\Contracts\BaseRepositoryInterface;
use App\Services\Contracts\BaseServiceInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class BaseService implements BaseServiceInterface
{
    public function __construct(protected BaseRepositoryInterface $repository)
    {}

    protected function result(array $data = [], string $message = 'ok', int $code = 200): array
    {
        return [
            'data' => $data,
            'message' => $message,
            'code' => $code,
        ];
    }

    public function index(array $params): LengthAwarePaginator
    {
        $data = $this->repository->index($params);

        return $data;
    }

	public function show(int $id): ?Model
    {
        $item = $this->repository->show($id);

        return $item;
    }

    public function store(array $data): ?Model
    {
        $item = $this->repository->store($data);

        return $item;
    }
}
