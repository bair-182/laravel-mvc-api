<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Warehouse;
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
            'customer' => $this->faker->name(),
            'warehouse_id' => $this->faker->numberBetween(1, 5),
            'status' => $this->faker->randomElement(['active', 'completed', 'canceled']),
            'created_at' => $this->faker->dateTimeThisYear()
        ];
    }
}
