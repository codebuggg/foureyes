<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Laravel\Passport\Passport;
use Tests\TestCase;

class RegisterTest extends TestCase
{

    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        \Artisan::call('passport:install');
    }

    public function test_valid_register_credentials()
    {
        $user = \App\Models\User::factory()->make()->toArray();
        $response = $this->post('/api/register', array_merge(
          $user, [
            "password" => "password",
            "c_password" => "password"
          ]
        ));
        $this->assertDatabaseCount('users', 1);
        $response
          ->assertOk()
          ->assertJson(fn (AssertableJson $json) =>
              $json
                ->has('token')
                ->etc()
          );
    }
}
