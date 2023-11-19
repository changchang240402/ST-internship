<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $supplier = Supplier::all()->random();
        $category = Category::all()->random();
        return [
            'product_id' => strtoupper(fake()->unique()->bothify('??##')),
            'product_name' => ucwords(fake('en_US')->words(2, true)),
            'company_id' => $supplier->company_id,
            'category_id' => $category->category_id,
            'amount' => fake()->numberBetween(1, 4000),
            'unit' => ucfirst(fake('en_US')->lexify()),
            'price' => fake()->randomNumber(5, false)
        ];
    }
}
