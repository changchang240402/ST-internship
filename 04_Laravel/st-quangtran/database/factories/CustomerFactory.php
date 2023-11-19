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
            'company_name' => $this->faker->company,
            'transaction_name' => $this->faker->word,
            'address' => $this->faker->streetAddress ,
            'email' => $this->faker->unique()->email,
            'phone' => $this->faker->e164PhoneNumber,
            'fax' => $this->faker->e164PhoneNumber,
        ];
    }
}
