<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => Customer::all()->random()->id,
            'employee_id' => Employee::all()->random()->employee_id,
            'order_date' => fake()->dateTimeBetween('-8 years', '-7 years', 'Asia/Ho_Chi_Minh')->format('Y-m-d'),
            'delivery_date' => fake()->dateTimeBetween('-6 years', '-5 years', 'Asia/Ho_Chi_Minh')->format('Y-m-d'),
            'shipping_date' => fake()->dateTimeBetween('-7 years', '-6 years', 'Asia/Ho_Chi_Minh')->format('Y-m-d'),
            'destination' => fake('vi_VN')->city()
        ];
    }
}
