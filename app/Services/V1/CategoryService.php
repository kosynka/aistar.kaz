<?php

namespace App\Services\V1;

use App\Repositories\V1\CategoryRepository;
use App\Services\Contracts\CategoryServiceInterface;
use App\Services\V1\BaseService;

class CategoryService extends BaseService implements CategoryServiceInterface
{
    public function __construct(CategoryRepository $repository)
	{
		parent::__construct($repository);
	}
}
