<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start_at ',
        'end_at',
        'category_id',
    ];

    public function Images(): HasMany
    {
          return $this->hasMany(Image::class);
    }


}
