<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => fake()->unique()->numerify('E###'),
            'last_name' => fake()->lastName,
            'first_name' => fake()->firstName,
            'birthday' => fake()->date($format = 'Y-m-d', $max = 'now'),
            'start_date' => fake()->date($format = 'Y-m-d', $max = 'now'),
            'address' => fake()->streetAddress,
            'phone' => fake()->e164PhoneNumber,
            'base_salary' => fake()->numberBetween($min = 10000000, $max = 100000000),
            'allowance' => fake()->numberBetween($min = 1000000, $max = 5000000)
        ];
    }
}
