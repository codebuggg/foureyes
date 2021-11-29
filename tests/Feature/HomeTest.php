<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\AuthenticatedTestCase as TestCase;
use App\Models\Product;

class HomeTest extends TestCase
{

    public function test_cart_created()
    {
        $products = Product::factory(5)->create()->toArray();
        Product::factory(5)->out_of_stock()->create();
        $response = $this->get(route("products.index"));
        $response
          ->assertOk()
          ->assertExactJson($products);
    }

}
