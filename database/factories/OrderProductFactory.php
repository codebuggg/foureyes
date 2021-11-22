<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Order;

class OrderProductFactory extends Factory
{

    public function definition()
    {
        return [
            "order_id" => Order::factory(),
            "product_id" => Product::factory(),
            "quantity" => 2,
            'price' => function (array $order_product) {
              return Product::find($order_product["product_id"])->price;
            },
            'total' => function (array $order_product) {
              return $order_product["price"] * $order_product["quantity"];
            }
        ];
    }
}
