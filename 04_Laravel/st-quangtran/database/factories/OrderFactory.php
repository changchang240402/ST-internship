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
        $customer = Customer::all()->random();
        $employee = Employee::all()->random();
        
        return [
            'customer_id' => $customer->id,
            'employee_id' => $employee->employee_id,
            'order_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'delivery_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'shipping_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'destination' => $this->faker->streetAddress,
        ];
    }
}
