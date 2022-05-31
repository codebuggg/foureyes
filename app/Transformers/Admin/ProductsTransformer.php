<?php

namespace App\Transformers\Admin;

use League\Fractal;

use App\Models\Product;
use App\Models\Color;

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
      "colors" => $product->colors,
      "description" => $product->description,
    ];
	}
}
