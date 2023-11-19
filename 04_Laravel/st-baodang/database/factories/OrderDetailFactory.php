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
            'invoice_id' => Order::all()->random()->id,
            'product_id' => Product::all()->random()->product_id,
            'price' => fake()->numberBetween(1000, 9999999),
            'amount' => fake()->numberBetween(1, 2000),
            'discount' => fake()->numberBetween(1000, 999999)
        ];
    }
}
