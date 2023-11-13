<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $name = ucwords(fake()->unique()->words(3, true));

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => fake()->sentences(3, true),
            'image' => fake()->imageUrl(1000, 500),
            'is_active' => fake()->boolean(),
            'price' => fake()->randomFloat(2, 10, 100),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    public function withDateInPast(int $daysAgo = 30): ProductFactory
    {
        return $this->state(function () use ($daysAgo) {
            return [
                'created_at' => now()->subDays($daysAgo),
                'updated_at' => now()->subDays($daysAgo),
            ];
        });
    }
}
