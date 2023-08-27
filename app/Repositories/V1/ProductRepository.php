<?php

namespace App\Repositories\V1;

use App\Models\Product;

class ProductRepository extends BaseRepository
{
	public function __construct(Product $model)
	{
		parent::__construct($model);
	}
}
