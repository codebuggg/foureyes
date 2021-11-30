<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\AuthenticatedTestCase as TestCase;
use App\Models\Cart;
use App\Models\Product;

class CartsTest extends TestCase
{

    public function setUp(): void{
      parent::setUp();
      $this->cart = Cart::factory()
        ->hasProducts(3)
        ->create();
    }


    public function test_view_cart()
    {
        $cart = $this->cart;
        $response = $this
          ->get(route('carts.index', ['cart_id' => $cart->id]));
        $response->assertJson(fn ($json) =>
          $json
            ->has('products', '3')
            ->etc()
      );
    }

    public function test_add_to_cart()
    {
        $cart = $this->cart;
        $product = Product::factory()->create();
        $params = [
          "product_id" => $product->id,
        ];
        $response = $this->post(route('carts.store', ['cart_id' => $cart->id]), $params);
        $this->assertDatabaseHas('cart_products', [
          "product_id" => $product->id,
          "cart_id" => $cart->id,
        ]);
    }

    public function test_remove_from_cart()
    {
        $cart = $this->cart;
        $product = $cart->products->last();
        $params = [
          "cart_id" => $cart->id,
          "product_id" => $product->id,
        ];
        $response = $this->delete(route('carts.destroy', $params));
        $this->assertDatabaseMissing('cart_products', $params);
    }

    public function test_update_cart_item_quantity()
    {
        $cart = Cart::factory()->create()->toArray();
        $params = [
          "product_id" => $cart["product_id"],
          "quantity" => 10,
        ];
        $response = $this->put(route('carts.update', $params));
        $this->assertDatabaseHas('carts', $params);
        $response->assertStatus(200);
    }

}
