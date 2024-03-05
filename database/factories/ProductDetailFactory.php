<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductDetail>
 */
class ProductDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'increase' => fake()->numberBetween(0, 50),
            'price' => fake()->numberBetween(10, 100),
            'decrease' => fake()->numberBetween(0, 50),
            'notes' => fake()->sentence,
        ];
    }
}
