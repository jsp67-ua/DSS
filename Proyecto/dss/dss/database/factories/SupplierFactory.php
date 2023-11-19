<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(), //Nombre del proveedor aleatorio
            'description' => 'this is a description',
            'email' => $this->faker->freeEmail(), //Email del proveedor aleatorio
            'phone' => $this->faker->phoneNumber() //Número de teléfono aleatorio
        ];
    }
}
