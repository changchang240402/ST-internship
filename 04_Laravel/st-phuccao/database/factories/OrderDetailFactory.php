<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetail>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'invoice_id' => function () {
                return Order::factory()->create()->id;
            },
            'product_id' => function () {
                return Product::factory()->create()->product_id;
            },
            'price' => fake()->randomFloat(2, 1, 100),
            'amount' => fake()->numberBetween(1, 10),
            'discount' => fake()->randomFloat(2, 0, 10),
        ];
    }
}
