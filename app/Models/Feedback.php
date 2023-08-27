<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Feedback extends Model
{
    use HasFactory;

	protected $fillable = [
		'user_id',
		'title',
		'text',
		'communication_method',
	];

	/**
     * Relations
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

	/**
     * Custom methods
     */
    public function getRelationsForLoading(): array
    {
        return [
            'user',
        ];
    }
}
