<?php

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticatedTestCase extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        \Artisan::call('passport:install');
        $this->seed();
        $this->user = \App\Models\User::all()[0];
        \Laravel\Passport\Passport::actingAs($this->user);
    }
}
