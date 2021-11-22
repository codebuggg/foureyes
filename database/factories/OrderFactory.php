<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;

class OrderFactory extends Factory
{
  
    public function definition()
    {
        return [
            "quantity" => 2,
            "user_id" => 1,
        ];
    }
}