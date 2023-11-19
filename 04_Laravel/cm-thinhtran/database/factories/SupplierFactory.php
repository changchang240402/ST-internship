<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id' => fake()->unique()->numerify('S##'),
            'company_name' => fake()->company,
            'transaction_name' => fake('vi_VN')->word,
            'address' => fake()->streetAddress,
            'phone' => fake()->e164PhoneNumber,
            'fax' => fake()->numberBetween($min = 1000000000, $max = 9999999999),
            'email' => fake()->unique()->safeEmail,
        ];
    }
}
