<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_name' => fake()->company(),
            'transaction_name' => fake()->word(5),
            'address'      => fake()->city(),
            'email'        => fake()->unique()->email(),
            'phone'        => fake()->phoneNumber(),
            'fax'          => fake()->phoneNumber()
        ];
    }
}
