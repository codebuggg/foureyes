<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    use HasFactory;

    protected $fillable = [
      "product_id",
      "cart_id",
      "quantity",
    ];

    protected $visible = [
      'quantity',
      'product',
    ];

    public function product()
    {
      return $this->belongsTo(Product::class);
    }

    public $timestamps = false;

}
