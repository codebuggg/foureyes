<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;


class ProductsTest extends TestCase
{

    use DatabaseMigrations, RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        \Artisan::call('passport:install');
        $this->seed();
        $user = \App\Models\User::where(["is_admin" => 1])->get()[0];
        Passport::actingAs($user);

        //See Below
        //$token = $user->createToken('bigStore')->accessToken;
    }

    public function test_fetches_all_products()
    {
      $response = $this->get('/api/admin/products');
      $response->assertOk();
    }

    public function test_store_product()
    {
      Storage::fake('products');
      $product = Product::factory()->make()->toArray();
      $response = $this->post('/api/admin/products', $product);
      $response->assertCreated();
      //Storage::disk('products')->assertExists($product["image"]->name);
      $this->assertDatabaseHas('products', $product);
    }
}
