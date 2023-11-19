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
            'employee_id' => strtoupper(fake()->unique()->lexify('???') . fake()->randomNumber(1)),
            'last_name' => fake('vi_VN')->lastName,
            'first_name' => fake('vi_VN')->firstName,
            'birthday' => fake()->dateTimeBetween('-40 years', '-18 years', 'Asia/Ho_Chi_Minh')->format('Y-m-d'),
            'start_date' => fake()->dateTimeBetween('-10 years', 'now', 'Asia/Ho_Chi_Minh')->format('Y-m-d'),
            'address' => fake('vi_VN')->city,
            'phone' => fake()->regexify('(0|3|5|7|8|9){1}([0-9]{8})'),
            'base_salary' => fake()->numberBetween(1000000, 99999999),
            'allowance' => fake()->numberBetween(0, 5000000)
        ];
    }
}
