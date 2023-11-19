<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'employee_id' => strtoupper($this->faker->unique()->lexify('EM??')),
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'birthday' => $this->faker->dateTimeBetween('-40 years', '-18 years')->format('Y-m-d H:i:s'),
            'start_date' => $this->faker->dateTimeBetween('-5 years', 'now')->format('Y-m-d H:i:s'),
            'address' => $this->faker->streetAddress,
            'phone' => Str::limit($this->faker->phoneNumber, 10),
            'base_salary' => $this->faker->randomFloat(2, 30000, 90000),
            'allowance' => $this->faker->randomFloat(2, 1000, 5000),
        ];
    }
}
