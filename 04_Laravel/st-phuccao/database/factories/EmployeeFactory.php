<?php

namespace Database\Factories;

use App\Models\Employee;
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
    protected $model = Employee::class;

    public function definition(): array
    {
        return [
            'employee_id' => fake()->unique()->regexify('[A-Z0-9]{4}'),
            'last_name' => fake()->text(40),
            'first_name' => fake()->text(10),
            'birthday' => fake()->dateTimeBetween('-30 years', '-18 years')->format('Y-m-d H:i:s'),
            'start_date' => fake()->dateTimeBetween('-5 years', 'now'),
            'address' => fake()->text(60),
            'phone' => fake()->regexify('[0-9]{10,15}'),
            'base_salary' => fake()->randomFloat(2, 3000, 10000),
            'allowance' => fake()->randomFloat(2, 0, 5000),
        ];
    }
}
