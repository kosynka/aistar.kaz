<?php

namespace App\Services\V1;

use App\Repositories\Contracts\BaseRepositoryInterface;
use App\Services\Contracts\BaseServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseService implements BaseServiceInterface
{
    public function __construct(private BaseRepositoryInterface $repository)
    {}

    public function index(array $params): ?Collection
    {
        $data = $this->repository->index($params);

        return $data;
    }

	public function show(int $id): ?Model
    {
        $item = $this->repository->show($id);

        return $item;
    }
}
