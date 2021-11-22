<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\AuthenticatedTestCase as TestCase;
use App\Models\Cart;

class CartsTest extends TestCase
{

    public function test_view_cart()
    {
        $cart = Cart::factory(1)->create()->toArray();
        Cart::factory(1)->create(["user_id" => 2])->toArray();
        $response = $this->get(route('carts.index'));
        $response->assertOk();
        $response->assertExactJson($cart);
    }

    public function test_add_to_cart()
    {
        $cart = [
          "product_id" => 1,
          "quantity" => 2
        ];
        $response = $this->post(route('carts.store'), $cart);
        $this->assertDatabaseHas('carts', $cart);
        $response->assertCreated();
    }

    public function test_remove_from_cart()
    {
        $cart = Cart::factory()->create()->toArray();
        $response = $this->delete(route('carts.destroy', [
          "product_id" => $cart["product_id"],
        ]));
        $this->assertDatabaseMissing('carts', $cart);
        $response->assertStatus(200);
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
