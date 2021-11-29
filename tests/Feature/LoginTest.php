<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class LoginTest extends TestCase
{

    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        /**
        *
        * Without Artisan call you will get a passport
        * "please create a personal access client" error
        */
        \Artisan::call('passport:install');
        // seed the database
        $this->seed();
    }

    public function test_invalid_login_credentials()
    {
        $response = $this->post('/api/login');
        $response->assertUnauthorized();
    }

    public function test_valid_login_credentials()
    {
        $user = \App\Models\User::factory()->create()->toArray();
        $response = $this->post('/api/login', array_merge(
          $user,
          [
            "password" => "password"
          ]
        ));
        $response
          ->assertOk()
          ->assertJson(fn ($json) =>
            $json
              ->has('token')
              ->etc()
          );
    }
}
