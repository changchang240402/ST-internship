<?php

namespace Database\Factories;

use App\Models\Customer;
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
    protected $model = Customer::class;

    public function definition(): array
    {
        return [
            'company_name' => fake()->text(50),
            'transaction_name' => fake()->text(20),
            'address' => fake()->text(50),
            'email' => fake()->unique()->safeEmail,
            'phone' => fake()->regexify('[0-9]{10,15}'),
            'fax' => fake()->optional()->regexify('[0-9]{10,15}'),
        ];
    }
}
