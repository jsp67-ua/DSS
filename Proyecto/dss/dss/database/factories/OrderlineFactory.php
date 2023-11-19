<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Orderline>
 */
class OrderlineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
                
            'amount' => $this->faker->randomDigit(),
            'total' => $this->faker->randomFloat(2,0,200),
            'status' => $this->faker->randomElement(['pending', 'paid', 'canceled']),
            'payment_method' => $this->faker->randomElement(['cash', 'card', 'paypal']),


                
        ];
    }
}