<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(User $user)
    {
        $user = new User;
        $user->name = "Admin";
        $user->email = "admin@foureyes.com";
        $user->password = bcrypt('secret');
        $user->is_admin = 1;
        $user->saveOrFail();
    }
}
