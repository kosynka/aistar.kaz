<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_id',
        'status ',
    ];

    public function cartProducts()
    {
        return $this->hasMany(CartProduct::class);
    }

    
}
