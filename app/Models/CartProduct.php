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
      "color_id",
    ];

    protected $visible = [
      'quantity',
      'product',
      'color',
    ];

    public function product()
    {
      return $this->belongsTo(Product::class);
    }

    public function color()
    {
      return $this->belongsTo(Color::class);
    }

    public $timestamps = false;

}
