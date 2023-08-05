<?php

namespace App\Services\V1;

use App\Repositories\Contracts\CityRepositoryInterface;
use App\Services\Contracts\CityServiceInterface;
use App\Services\V1\BaseService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CityService extends BaseService implements CityServiceInterface
{
    public function __construct(private CityRepositoryInterface $repository)
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
