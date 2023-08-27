<?php

namespace App\Repositories\V1;

use App\Models\Announcement;

class AnnouncementRepository extends BaseRepository
{
	public function __construct(Announcement $model)
	{
		parent::__construct($model);
	}
}
