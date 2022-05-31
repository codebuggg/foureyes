<?php

namespace App\Transformers\Admin;

use League\Fractal;

use App\Models\Product;

class ProductTransformer extends Fractal\TransformerAbstract
{
    public function transform(Product $product)
	{
        return array_merge(
            fractal($product, new ProductsTransformer())->toArray(),
            [
                "features" => $product->features,
                "colors" => $product->colors,
            ]
        );
	}
}
