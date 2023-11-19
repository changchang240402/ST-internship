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
            'customer_id' => function () {
                return Customer::factory()->create()->id;
            },
            'employee_id' => function () {
                return Employee::factory()->create()->employee_id;
            },
            'order_date' => fake()->dateTimeThisYear,
            'delivery_date' => fake()->dateTimeThisYear,
            'shipping_date' => fake()->dateTimeThisYear,
            'destination' => fake()->address,
        ];
    }
}
