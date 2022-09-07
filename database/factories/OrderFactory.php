<?php

namespace Database\Factories;

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
    public function definition()
    {
        return [
            'order_total' => $this->faker->randomFloat(null, 19.99, 49.99),
            'delivery_type' => $this->faker->unique()->text(10),
            'user_id' => $this->faker->randomNumber(rand(1,3))
        ];
    }
}
