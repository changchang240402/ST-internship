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
            'customer_id' => Customer::all()->random()->id ,
            'employee_id' => Employee::all()->random()->employee_id,
            'order_date' => fake()->date($format = 'Y-m-d', $max = 'now') ,
            'delivery_date' => fake()->date($format = 'Y-m-d', $max = 'now') ,
            'shipping_date' => fake()->date($format = 'Y-m-d', $max = 'now') ,
            'destination' => fake()->address() ,
        ];
    }
}
