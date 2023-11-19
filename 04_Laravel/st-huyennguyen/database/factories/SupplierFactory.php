<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

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
            'company_id' => strtoupper(fake()->unique()->bothify('???')),
            'company_name' => fake()->company(),
            'transaction_name' => strtoupper(fake()->state()),
            'address' => fake()->city(),
            'email' => fake()->unique()->regexify('[a-z0-9\.]{15}') . '@gmail.com',
            'phone' => fake()->numerify('###-###-####'),
            'fax' => fake()->ssn()
        ];
    }
}
