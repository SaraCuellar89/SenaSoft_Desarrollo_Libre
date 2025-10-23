<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Asientos>
 */
class AsientosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // NUMEROS PARA LAS FILAS DE LOS ASIENTOS
        $fila = $this->faker->numberBetween(1, 70);
        // LETRAS PARA LAS COLUMNAS DE LOS ASIENTOS
        $columna = $this->faker->randomElement(['A', 'B', 'C', 'D', 'E']);
        // COMBINACION DE AMBOS
        $asiento = $fila . $columna;

        return [
            'asiento' => $asiento,
            'estado' => $this->faker->boolean(true),
        ];
    }
}
