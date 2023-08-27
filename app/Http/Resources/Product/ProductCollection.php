<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\BaseResourceCollection;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductCollection extends BaseResourceCollection
{
    protected function getResourceForPagination(): AnonymousResourceCollection
    {
        return ProductResource::collection($this->collection);
    }
}
