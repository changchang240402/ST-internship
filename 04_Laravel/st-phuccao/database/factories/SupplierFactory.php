<?php

namespace Database\Factories;

use App\Models\Supplier;
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
    protected $model = Supplier::class;

    public function definition(): array
    {
        return [
            'company_id' => fake()->unique()->regexify('[A-Z]{3}'),
            'company_name' => fake()->text(50),
            'transaction_name' => fake()->text(20),
            'address' => fake()->text(50),
            'phone' => fake()->regexify('[0-9]{10,15}'),
            'fax' => fake()->optional()->regexify('[0-9]{10,15}'),
            'email' => fake()->unique()->safeEmail,
        ];
    }
}
