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
        $product = Product::all()->random();
        $productId = $product->product_id;
        $price = $product->price + fake()->numberBetween(5, 100) * 1000;
        $amount = fake()->numberBetween(5, $product->amount);
        return [
            'invoice_id' => Order::all()->random()->id,
            'product_id' => $productId,
            'price' =>  $price,
            'amount' => $amount,
            'discount' => fake()->numberBetween(0, 10) * 1000,
        ];
    }
}
