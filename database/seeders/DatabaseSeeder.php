<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        echo "Seeding user" . PHP_EOL;
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1111'),
            'remember_token' => Str::random(10),
        ]);

        echo "Seeding products" . PHP_EOL;
        Product::factory(20)->create();

        echo "Seeding orders" . PHP_EOL;
        Order::factory(20)->create();
    }
}
