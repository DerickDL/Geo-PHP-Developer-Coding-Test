<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Order;

class UsersAndOrdersSeeder extends Seeder
{
    public function run()
    {
        // Seed Users table
        User::factory()->count(5)->create();

        // Seed Orders table
        $users = User::all();
        $users->each(function ($user) {
            Order::factory()->count(rand(1, 5))->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
