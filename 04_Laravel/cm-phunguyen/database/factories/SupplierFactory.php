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
            'company_id' => fake()->unique()->numerify('C##'),
            'company_name'=> fake()->company(),
            'transaction_name'=>fake()->word(5),
            'address'=>fake()->city(),
            'phone'=>fake()->phoneNumber(),
            'fax'=>fake()->phoneNumber(),
            'email'=>fake()->email()
        ];
    }
}
