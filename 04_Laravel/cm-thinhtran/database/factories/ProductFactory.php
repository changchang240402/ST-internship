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
            'product_id' => fake()->unique()->numerify('P###') ,
            'product_name' => fake()->lastName() ,
            'company_id' => Supplier::all()->random()->company_id,
            'category_id' => Category::all()->random()->category_id,
            'amount' => fake()->numberBetween($min = 1, $max = 1000) ,
            'unit' => fake()->word() ,
            'price' => fake()->numberBetween($min = 1000, $max = 9000) ,
        ];
    }
}
