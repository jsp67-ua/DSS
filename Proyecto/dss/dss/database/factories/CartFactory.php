<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {      

        return [
            'total' => $this->faker->randomFloat(2,0,200), //En un futuro se controlará que el valor sea la suma del carrito
        ];
    }
}
