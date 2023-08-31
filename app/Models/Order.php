<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payment_type',
        'payment_status',
        'price',
        'status',
        'city_id',
        'address',
        'comment', 
    ];

    /**
     * Relations
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Custom methods
     */
    public function getRelationsForLoading(): array
    {
        return [
            'user',
            'city',
        ];
    }

    public function getPaymentType(): string
    {
        $types = [
            0 => 'не указано',
            1 => 'карта',
            2 => 'наличная',
        ];

        return $types[$this->attributes['payment_type']];
    }

    public function getPaymentStatus(): string
    {
        $types = [
            0 => 'не указано',
            1 => 'оплачено',
            2 => 'не оплачено',
        ];

        return $types[$this->attributes['payment_status']];
    }

    public function getStatus(): string
    {
        $types = [
            0 => 'не указано',
            1 => 'создан',
            2 => 'в процессе',
            3 => 'доставляется',
            4 => 'доставлено',
            5 => 'отменено',
        ];

        return $types[$this->attributes['payment_status']];
    }
}
