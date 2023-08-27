<?php

namespace App\Http\Resources\Review;

use App\Http\Resources\BaseResource;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;

class ReviewResource extends BaseResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user' => new UserResource($this->user),
            'product' => new ProductResource($this->product),
            'title' => $this->title,
            'text' => $this->text,
            'rating' => $this->rating,
        ];
    }
}
