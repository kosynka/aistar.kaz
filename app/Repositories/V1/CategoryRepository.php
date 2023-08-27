<?php

namespace App\Repositories\V1;

use App\Models\Category;

class CategoryRepository extends BaseRepository
{
	public function __construct(Category $model)
	{
		parent::__construct($model);
	}
}
