<?php

namespace App\Transformers\Admin;

use League\Fractal;

use App\Models\Product;

class ProductsTransformer extends Fractal\TransformerAbstract
{
  public function transform(Product $product)
	{
    return [
      'id' => (int) $product->id,
      "images" => $product->images,
      "image" => $product->images[0],
      "price" => $product->price,
      "name" => $product->name,
    ];
	}
}
