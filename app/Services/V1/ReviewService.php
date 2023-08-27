<?php

namespace App\Services\V1;

use App\Repositories\V1\ReviewRepository;
use App\Services\V1\BaseService;
use Illuminate\Database\Eloquent\Model;

class ReviewService extends BaseService
{
    public function __construct(ReviewRepository $repository)
	{
		parent::__construct($repository);
	}

	public function store(array $data): ?Model
    {
        $item = $this->repository->store($data);

        return $item;
    }
}
