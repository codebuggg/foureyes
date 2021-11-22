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

    /*
    public function test_deletes_a_product()
    {
        $product = Product::factory()->create();
        $response = $this->delete(route('admin.products.show', $product));
        $response->assertOk();
        $this->assertSoftDeleted($product);
    }

    public function test_updates_a_product_unit()
    {
        $product = Product::factory()->create();
        $units = 30;
        $response = $this->put(route('admin.products.units', $product), ["units" => $units]);
        $this->assertDatabaseHas('products', [
          "id" => $product["id"],
          "units" => $product["units"] += $units
        ]);
        $response->assertOk();
    }
    */

}
