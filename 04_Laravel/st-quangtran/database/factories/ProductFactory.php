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
            'product_id' => $this->faker->unique()->regexify('[A-Z0-9]{4}'),
            'product_name' => $this->faker->word,
            'company_id' => $supplier->company_id,
            'category_id' => $category->category_id,
            'amount' => $this->faker->numberBetween(1, 1000),
            'unit' => $this->faker->text(10),
            'price' => $this->faker->randomFloat(2, 1, 1000),
        ];
    }
}
