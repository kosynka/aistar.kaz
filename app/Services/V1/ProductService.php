<?php

namespace App\Services\V1;

use App\Repositories\V1\ProductRepository;
use App\Services\V1\BaseService;

class ProductService extends BaseService
{
    public function __construct(ProductRepository $repository)
	{
		parent::__construct($repository);
	}
}
