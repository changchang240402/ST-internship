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
            'company_id' => fake()->unique()->regexify('[A-Z]{3}'),
            'company_name' => fake('vi_VN')->company(),
            'transaction_name' => strtoupper(fake()->text(20)),
            'address' => fake('vi_VN')->address(),
            'email' => fake()->unique()->companyEmail(),
            'phone' => fake()->numerify('##########'),
            'fax' => fake()->numerify('##########'),
        ];
    }
}
