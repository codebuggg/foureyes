<?php

namespace App\Transformers;

use League\Fractal;

use App\Models\CartProduct;

class CartProductsTransformer extends Fractal\TransformerAbstract
{
  public function transform(CartProduct $cart_product)
	{
    return [
      'id' => (int) $cart_product->id,
      'quantity' => $cart_product->quantity,
      "product" => fractal($cart_product->product, new ProductsTransformer())->toArray(),
      "color" => $cart_product->color,
    ];
	}
}
