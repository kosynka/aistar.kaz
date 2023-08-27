<?php

namespace App\Http\Resources\Review;

use App\Http\Resources\BaseResourceCollection;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ReviewCollection extends BaseResourceCollection
{
    protected function getResourceForPagination(): AnonymousResourceCollection
    {
        return ReviewResource::collection($this->collection);
    }
}
