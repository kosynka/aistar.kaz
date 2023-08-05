<?php

namespace App\Http\Resources\City;

use App\Http\Resources\BaseResourceCollection;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CityCollection extends BaseResourceCollection
{
    protected function getResourceForPagination(): AnonymousResourceCollection
    {
        return CityResource::collection($this->collection);
    }
}
