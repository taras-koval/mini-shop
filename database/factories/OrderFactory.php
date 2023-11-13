<?php

namespace Database\Factories;

use App\Enums\OrderStatusEnum;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'product_id' => Product::inRandomOrder()->first() ?? Product::factory(),
            'customer_name' => fake()->name(),
            'customer_email' => fake()->email(),
            'customer_phone' => fake()->phoneNumber(),
            'comment' => fake()->sentence(),
            'status' => fake()->randomElement(OrderStatusEnum::cases()),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    public function withDateInPast(int $daysAgo = 30): OrderFactory
    {
        return $this->state(function () use ($daysAgo) {
            return [
                'created_at' => now()->subDays($daysAgo),
                'updated_at' => now()->subDays($daysAgo),
            ];
        });
    }
}
