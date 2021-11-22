<?php

namespace Tests\Feature;

use Tests\AdminTestCase as TestCase;
use App\Models\Order;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class AdminOrdersTest extends TestCase
{

    public function test_fetches_all_orders()
    {
        $response = $this->get(route('admin.orders.index'));
        $response->assertOk();
    }

    public function test_shows_an_order()
    {
        $order = Order::factory()->create();
        $response = $this->get(route('admin.orders.show', $order));
        $response
          ->assertOk()
          ->assertJson(fn ($json) =>
            $json
              ->has('products')
              ->etc()
        );
    }

    public function test_deletes_an_order()
    {
        $order = Order::factory()->create();
        $response = $this->delete(route('admin.orders.show', $order));
        $response->assertOk();
        $this->assertSoftDeleted($order);
    }

    public function test_updates_an_orders_state()
    {
        $order = Order::factory()->create();
        $state = "Delivering";
        $response = $this->put(route('admin.orders.state', $order), [
          "state" => $state,
        ]);
        $this->assertDatabaseHas('orders', [
          "id" => $order["id"],
          "state" => $state,
        ]);
        $response
          ->assertOk()
          ->assertJson(fn ($json) =>
            $json
              ->where('status', true)
              ->etc()
          );
    }

}
