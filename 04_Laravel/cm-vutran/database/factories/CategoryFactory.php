<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Category::class;

    public function definition()
    {
        return [
            'category_id' => strtoupper($this->faker->unique()->lexify('C?')),
            'category_name' => $this->faker->word, // Generates a random word for category_name
        ];
    }
}
