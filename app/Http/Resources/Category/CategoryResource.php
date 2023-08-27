<?php

namespace App\Http\Resources\Category;

use App\Http\Resources\BaseResource;
use Illuminate\Http\Request;

class CategoryResource extends BaseResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'childs' => CategoryResource::collection($this->childs),
        ];
    }
}
