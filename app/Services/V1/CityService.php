<?php

namespace App\Services\V1;

use App\Repositories\V1\CityRepository;
use App\Services\Contracts\CityServiceInterface;
use App\Services\V1\BaseService;

class CityService extends BaseService implements CityServiceInterface
{
    public function __construct(CityRepository $repository)
	{
		parent::__construct($repository);
	}
}
