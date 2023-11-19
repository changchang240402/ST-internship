<?php

namespace Database\Factories;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Supplier::class;

    public function definition(): array
    {
        return [
            'company_id' => strtoupper($this->faker->unique()->lexify('S??')),
            'company_name' => $this->faker->company,
            'transaction_name' => $this->faker->word,
            'address' => $this->faker->streetAddress,
            'email' => $this->faker->unique()->safeEmail,
            'phone_number' => Str::limit($this->faker->phoneNumber, 10),
            'fax' => Str::random(5),
        ];
    }
}
