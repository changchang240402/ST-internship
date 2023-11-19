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
        return [
            'product_id' => strtoupper(fake()->unique()->lexify('????')),
            'product_name' => substr(fake('vi_VN')->jobTitle, 0, 14),
            'company_id' => Supplier::all()->random()->company_id,
            'category_id' => Category::all()->random()->category_id,
            'amount' => fake()->numberBetween(1, 2000),
            'unit' => fake('vi_VN')->lexify('???????'),
            'price' => fake()->numberBetween(1000, 9999999),
        ];
    }
}
