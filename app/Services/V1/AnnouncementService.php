<?php

namespace App\Services\V1;

use App\Repositories\V1\AnnouncementRepository;
use App\Services\V1\BaseService;

class AnnouncementService extends BaseService
{
    public function __construct(AnnouncementRepository $repository)
	{
		parent::__construct($repository);
	}
}
