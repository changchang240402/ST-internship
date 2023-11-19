<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

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
            'employee_id' => strtoupper(fake()->bothify('?###')),
            'last_name' => fake()->lastName(),
            'first_name' => fake()->firstName(),
            'birthday' => fake()->dateTimeThisCentury->format('Y-m-d'),
            'start_date' => date('Y-m-d'),
            'address' => fake()->city(),
            'phone' => fake()->numerify('###-###-####'),
            'base_salary' => 100000,
            'allowance' => 0,
        ];
    }
}
