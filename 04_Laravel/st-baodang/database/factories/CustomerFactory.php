<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_name' => 'Công ty ' . fake('vi_VN')->company,
            'transaction_name' => strtoupper(fake('vi_VN')->unique()->lexify('?????')),
            'address' => fake('vi_VN')->city,
            'email' => fake('vi_VN')->unique()->companyEmail,
            'phone' => fake('vi_VN')->regexify('(0|3|5|7|8|9){1}([0-9]{8})'),
            'fax' => fake('vi_VN')->regexify('(0|3|5|7|8|9){1}([0-9]{8})')
        ];
    }
}
