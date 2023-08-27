<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\BaseResource;
use App\Http\Resources\Category\CategoryResource;
use Illuminate\Http\Request;

class ProductResource extends BaseResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'slug' => $this->slug,
            'price' => $this->price,
            'discount_price' => $this->discount_price,
            'amount' => $this->amount,
            'has_discount' => $this->has_discount,
            'views_count' => $this->views_count,
            'rating' => $this->rating,
            'category' => new CategoryResource($this->category),
        ];
    }
}
