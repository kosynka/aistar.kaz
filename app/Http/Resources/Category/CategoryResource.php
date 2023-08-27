<?php

namespace App\Http\Resources\Category;

use App\Http\Resources\BaseResource;
use Illuminate\Http\Request;

class CategoryResource extends BaseResource
{
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'childs' => CategoryResource::collection($this->childs),
        ];
    }
}
