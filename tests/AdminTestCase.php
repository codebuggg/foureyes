<?php

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;

class AdminTestCase extends TestCase
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

}
