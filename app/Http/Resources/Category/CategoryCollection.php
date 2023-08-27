<?php

namespace App\Http\Resources\Category;

use App\Http\Resources\BaseResourceCollection;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoryCollection extends BaseResourceCollection
{
    protected function getResourceForPagination(): AnonymousResourceCollection
    {
        return CategoryResource::collection($this->collection);
    }
}
