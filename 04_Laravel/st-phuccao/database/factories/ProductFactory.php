<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
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
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'product_id' => fake()->unique()->randomNumber(4),
            'product_name' => fake()->text(30),
            'company_id' => function () {
                return Supplier::factory()->create()->company_id;
            },
            'category_id' => function () {
                return Category::factory()->create()->category_id;
            },
            'amount' => fake()->numberBetween(1, 100),
            'unit' => fake()->text(10),
            'price' => fake()->randomFloat(2, 1, 100),
        ];
    }
}
