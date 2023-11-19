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
            'invoice_id' => Order::all()->random()->id  ,
            'product_id' => Product::all()->random()->product_id  ,
            'price' => fake()->numberBetween($min = 100000, $max = 20000000),
            'amount' => fake()->numberBetween($min = 1, $max = 200) ,
            'discount' => fake()->numberBetween($min = 1000, $max = 20000),
        ];
    }
}
