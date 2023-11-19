<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(), //Nombre del producto aleatorio
            'description' => "this is a description",
            'price' => $this->faker->randomFloat(2,0,200), //Precio del producto aleatorio
            'stock' => $this->faker->randomDigit(), //Cantidad de stoc aleatorio
        ];
    }
}
