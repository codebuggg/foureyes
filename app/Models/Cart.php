<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'quantity'
    ];

    protected $casts = [
        'product_id' => 'int',
        'quantity' => 'int',
        'user_id' => 'int',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
