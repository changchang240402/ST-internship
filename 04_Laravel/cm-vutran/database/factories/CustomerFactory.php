<?php

namespace Database\Factories;

use App\Models\Customer;
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
    protected $model = Customer::class;

    public function definition(): array
    {
        return [
            'company_name' => $this->faker->company,
            'transaction_name' => $this->faker->word,
            'address' => $this->faker->streetAddress,
            'email' => $this->faker->unique()->safeEmail,
            'phone_number' => Str::limit($this->faker->phoneNumber, 10),
            'fax' => Str::random(5),
        ];
    }
}
