<?php

namespace Database\Factories;

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
            'company_name' => fake()->company,
            'transaction_name' => fake('vi_VN')->word,
            'address' => fake()->streetAddress,
            'email' => fake()->unique()->freeEmail,
            'phone' => fake()->e164PhoneNumber,
            'fax' => fake()->numberBetween($min = 1000000000, $max = 9999999999),
        ];
    }
}
