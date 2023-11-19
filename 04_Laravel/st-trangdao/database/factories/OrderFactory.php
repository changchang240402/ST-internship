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
        $customerId = $customer->id;
        $destination = $customer->address;
        $date = fake()->dateTimeBetween('-20 days', 'now', 'Asia/Ho_Chi_Minh')->format('Y-m-d');
        return [
            'customer_id' => $customerId,
            'employee_id' => Employee::all()->random()->employee_id,
            'order_date' => $date,
            'delivery_date' => $date,
            'shipping_date' => $date,
            'destination' => $destination,
        ];
    }
}
