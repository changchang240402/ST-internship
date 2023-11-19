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
            'company_id' => strtoupper(fake()->unique()->regexify('([A-Z]{3})')),
            'company_name' => 'Công ty ' . fake('vi_VN')->company(),
            'transaction_name' => strtoupper(fake()->unique()->regexify('([A-Z]{4})')),
            'address' => fake()->boolean() ? fake('vi_VN')->city() : fake('vi_VN')->province(),
            'email' => fake('vi_VN')->unique()->companyEmail(),
            'phone' => fake('vi_VN')->unique()->regexify('0([0-9]{9})'),
            'fax' => fake('vi_VN')->unique()->regexify('0([0-9]{9})'),
        ];
    }
}
