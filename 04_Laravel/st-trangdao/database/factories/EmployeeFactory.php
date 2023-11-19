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
            'employee_id' => strtoupper(fake()->unique()->regexify('([A-Z]{1})([0-9]{3})')),
            'last_name' => fake('vi_VN')->lastName() . ' ' . fake('vi_VN')->middleName(),
            'first_name' => fake('vi_VN')->firstName(),
            'birthday'  => fake()->dateTimeBetween('-40 years', '-18 years', 'Asia/Ho_Chi_Minh')->format('Y-m-d'),
            'start_date'  => fake()->dateTimeBetween('-18 years', 'now', 'Asia/Ho_Chi_Minh')->format('Y-m-d'),
            'address' => fake()->boolean() ? fake('vi_VN')->city() : fake('vi_VN')->province(),
            'phone' => fake('vi_VN')->unique()->regexify('0([0-9]{9})'),
            'base_salary' => fake()->numberBetween(5000, 99999) * 1000,
            'allowance' => fake()->numberBetween(0, 5000) * 1000,
        ];
    }
}
