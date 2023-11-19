<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Supplier;
use Faker\Factory as Faker;
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
        $product = ['Sữa','Bánh', 'Máy tính', 'Bàn', 'Ghế', 'Áo', 'Quả','Bút','Vở', 'Giày', 'Dép', 'Quần'];
        $unit = ['Hộp','Ký', 'Thùng', 'Bộ', 'Cái' ];
        $faker = Faker::create();
        return [
            'product_id' => strtoupper(fake()->unique()->regexify('([A-Z]{2})([0-9]{2})')),
            'product_name' => $faker->randomElement($product) . ' ' . fake('vi_VN')->words(rand(1, 2), true),
            'company_id' => Supplier::all()->random()->company_id,
            'category_id' => Category::all()->random()->category_id,
            'amount' => fake()->numberBetween(10, 200),
            'unit' => $faker->randomElement($unit),
            'price' => fake()->numberBetween(5, 5000) * 1000,
        ];
    }
}
