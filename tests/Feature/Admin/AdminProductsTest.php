<?php

namespace Tests\Feature;

use Tests\AdminTestCase as TestCase;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class AdminProductsTest extends TestCase
{

    public function test_fetches_all_products()
    {
        $response = $this->get('/api/admin/products');
        $response->assertOk();
    }

    public function test_shows_a_product()
    {
        $product = Product::factory()->create();
        $response = $this->get(route('admin.products.show', $product));
        $response->assertOk();
    }

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

    public function test_stores_a_product()
    {
        Storage::fake('products');
        $product = Product::factory()->make()->toArray();
        $params = $product;
        $params["image"] = UploadedFile::fake()->image('product.jpg');
        $response = $this->post(route('admin.products.store'), $params);
        $response
          ->assertCreated();
        $this->assertDatabaseHas('products', $product);
        //Storage::disk('products')->assertExists($product["image"]->name);
    }

}
