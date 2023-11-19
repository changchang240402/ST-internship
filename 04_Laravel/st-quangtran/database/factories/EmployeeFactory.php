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
            'employee_id' => $this->faker->unique()->regexify('[A-Z0-9]{4}'),
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'birthday' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'start_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'address' => $this->faker->streetAddress,
            'phone' => $this->faker->e164PhoneNumber,
            'base_salary' => $this->faker->randomFloat(2, 1000, 5000),
            'allowance' => $this->faker->randomFloat(2, 100, 1000),
        ];
    }
}
