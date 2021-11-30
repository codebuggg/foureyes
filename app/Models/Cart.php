<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $casts = [
        'user_id' => 'int',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'cart_products');
    }

    public function cart_products()
    {
        return $this->hasMany(CartProduct::class);
    }
}
