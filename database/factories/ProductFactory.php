<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

class ProductFactory extends Factory
{

    protected $model = Product::class;

    public function definition()
    {
        return [
          'name' => "MEN'S BETTER THAN NAKED & JACKET",
          'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua consequat.',
          'units' => 21,
          'price' => 200.10,
          'image' => 'product.jpg' //UploadedFile::fake()->image('product.jpg'),
        ];
    }

    public function out_of_stock()
    {
        return $this->state(function (array $attributes) {
            return [
                'units' => 0,
            ];
        });
    }

}
