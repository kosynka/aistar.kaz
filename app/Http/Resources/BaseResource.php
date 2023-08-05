<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

abstract class BaseResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [];
    }
}
