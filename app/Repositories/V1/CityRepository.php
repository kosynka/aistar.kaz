<?php

namespace App\Repositories\V1;

use App\Models\City;

class CityRepository extends BaseRepository
{
	public function __construct(City $model)
	{
		parent::__construct($model);
	}
}
