<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => strtoupper(fake()->unique()->regexify('([A-Z]{2})')),
            'category_name' => fake('vi_VN')->words(rand(2, 3), true),
        ];
    }
}
