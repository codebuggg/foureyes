<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\AuthenticatedTestCase as TestCase;
use App\Models\Order;
use App\Models\Cart;
use App\Models\OrderProduct;

class OrdersTest extends TestCase
{

    public function test_fetches_user_orders()
    {
        //$products = Product::factory(1)->create();
        //$orders = Order::factory(1)->create()->toArray();
        $order_products = OrderProduct::factory()->create();
        Order::factory()->create(["user_id" => 3]);
        $response = $this->get(route("orders.index"));
        $response
          ->assertOk()
          ->assertJson(fn (AssertableJson $json) =>
              $json
                ->has(1)
                ->each(fn ($json) =>
                  $json
                    ->where('user_id', 1)
                    ->has('products', 1)
                    ->etc()
                )
              );
    }

    public function test_store_order()
    {
        $cart = Cart::factory()->create([
          "user_id" => $this->user->id
        ])->toArray();
        $response = $this->post(route('orders.store'), [
          "address" => "Address",
        ]);
        $this->assertDatabaseHas("orders", [
          "user_id" => $this->user->id
        ]);
        $this->assertDatabaseMissing('carts', $cart);
        $response->assertCreated();
    }

    public function test_no_cart_found()
    {
        $response = $this->post(route('orders.store'), [
          "address" => "Address",
        ]);
        $response->assertStatus(422);
    }

    public function test_cancels_order()
    {
        $order = Order::factory()->create();
        $response = $this->delete(route("orders.destroy", $order));
        $response->assertOk();
        $this->assertDatabaseMissing('orders', $order->toArray());
    }

}
