<?php

namespace App\Http\Resources\Announcement;

use App\Http\Resources\BaseResourceCollection;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AnnouncementCollection extends BaseResourceCollection
{
    protected function getResourceForPagination(): AnonymousResourceCollection
    {
        return AnnouncementResource::collection($this->collection);
    }
}
