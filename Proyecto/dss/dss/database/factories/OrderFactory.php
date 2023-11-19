<?php

namespace Database\Factories;

use App\Models\Orderline;
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


            'total' => $this->faker->randomFloat(2, 0, 200), 
            'payment_method' => $this->faker->randomElement(['cash', 'card', 'paypal']),
            'status' => $this->faker->randomElement(['pending', 'completed', 'canceled']),



        ];

    }



}