<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'total_price' => fake()->numberBetween(50000, 1000000),
            'status' => fake()->randomElement(['pending', 'paid', 'failed']),
            'order_date' => now(),
        ];
    }
}
