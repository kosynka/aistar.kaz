<?php

namespace App\Http\Resources\Announcement;

use App\Http\Resources\BaseResource;
use App\Http\Resources\Category\CategoryResource;
use Illuminate\Http\Request;

class AnnouncementResource extends BaseResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'start_at ' => $this->start_at ,
            'end_at' => $this->end_at,
            'category' => new CategoryResource($this->category),
        ];
    }
}
