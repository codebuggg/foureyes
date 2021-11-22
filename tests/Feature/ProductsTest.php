<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\AuthenticatedTestCase as TestCase;
use App\Models\Product;

class ProductsTest extends TestCase
{

    public function test_fetch_stocked_products()
    {
        $products = Product::factory(5)->create()->toArray();
        Product::factory(5)->out_of_stock()->create();
        $response = $this->get(route("products.index"));
        $response
          ->assertOk()
          ->assertExactJson($products);
    }

    public function test_show_stocked_product()
    {
        $product = Product::factory()
          ->hasImages(2, ["name" => "product.jpg"])
          ->create();
        $response = $this->get(route("products.show", $product));
        $response
          ->assertOk()
          ->assertJson(fn ($json) =>
            $json
              ->has('images')
              ->etc()
          );
    }

    public function test_show_out_of_stock_product_404()
    {
        $product = Product::factory()->out_of_stock()->create();
        $response = $this->get(route("products.show", $product));
        $response->assertNotFound();
    }

}
