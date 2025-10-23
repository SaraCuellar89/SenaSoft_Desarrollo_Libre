<?php

namespace Database\Factories;

use App\Models\Avion;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Vuelos>
 */
class VuelosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start_time = $this->faker->dateTimeBetween(now(), "+1 week");
        $end_time = Carbon::instance($start_time)->addHour(rand(1, 3));
        return [
            'avion_id' => Avion::inRandomOrder()->first()->id,
            'image' => '',
            'origen' => $this->faker->randomElement(["Riohacha", "Barranquilla", "Bogotá", "Valledupar"]),
            'destino' => $this->faker->randomElement(["Cali", "Cartagena", "Pereira", "Medellin"]),
            "fecha_salida" => $start_time,
            "fecha_llegada" => $end_time,
            "tipo_vuelo" => $this->faker->randomElement(["solo ida", "ida y vuelta"]),
            "precio" => $this->faker->randomFloat(3, 250, 490)
        ];
    }
}
