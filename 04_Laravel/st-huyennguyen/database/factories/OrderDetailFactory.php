<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Orderdetail>
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
        $data = [];
        $invoices = Order::all();
        $products = Product::all();
        foreach ($invoices as $invoice) {
            foreach ($products as $product) {
                $data[] = $invoice->id . '-' . $product->product_id . '-' . $product->price;
            }
        }
        $random = fake()->unique()->randomElement($data);
        $foreign = explode('-', $random);
        return [
            'invoice_id' => $foreign[0],
            'product_id' => $foreign[1],
            'price' => $foreign[2],
            'amount' => fake()->numberBetween(1, 4000),
            'discount' => fake()->numberBetween(0, 4000)
        ];
    }
}
