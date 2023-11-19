<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

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
            'employee_id' => fake()->unique()->regexify('[A-Z]{4}'),
            'last_name' => fake('vi_VN')->lastName(),
            'first_name' => fake('vi_VN')->firstName(),
            'birthday' => fake()->dateTimeBetween('-30 years' , '-18 years')->format('Y/m/d H:i:s'),
            'start_date' => fake()->dateTimeBetween('-5 years' , 'now')->format('Y/m/d H:i:s'),
            'address' => fake('vi_VN')->address(),
            'phone' => fake()->numerify('##########'),
            'base_salary' => fake()->randomFloat(2, 5000000, 50000000),
            'allowance' => fake()->randomFloat(2, 2000000, 20000000),
        ];
    }
}
