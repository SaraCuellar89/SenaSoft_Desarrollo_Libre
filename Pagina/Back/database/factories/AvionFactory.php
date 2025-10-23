<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Avion>
 */
class AvionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->randomElement(["Boeing 737", "Boeing 747", "Boeing 777", "Airbus A330"]),
            'modelo' => $this->faker->randomElement(["Aviones comerciales"]),
            'aerolinea' => $this->faker->randomElement(["Avianca", "Clic Air", "LATAM Airlines"]),
            "capacidad" => $this->faker->numberBetween(100, 150)
        ];
    }
}
