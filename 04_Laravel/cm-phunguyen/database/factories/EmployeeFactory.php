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
            'last_name' => fake()->lastName(),
            'first_name' => fake()->firstName(),
            'birthday' => fake()->dateTime($max = 'now', $timezone = null),
            'start_date'=> fake()->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null),
            'address'=> fake()->city(),
            'phone'=>fake()->phoneNumber(),
            'allowance' => fake()->randomFloat(2,1000,10000),
            'base_salary'=>fake()->randomFloat(2,1000,10000)
        ];
    }
}
