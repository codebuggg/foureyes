<?php

namespace App\Transformers;

use League\Fractal;

use App\Models\Product;

class ProductsTransformer extends Fractal\TransformerAbstract
{
  public function transform(Product $product)
	{
    return [
      'id' => (int) $product->id,
      "images" => $product->images,
      "image" => $product->image,
      "price" => $product->price,
      "name" => $product->name,
    ];
	}
}
