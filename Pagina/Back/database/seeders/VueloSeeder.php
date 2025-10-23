<?php

namespace Database\Seeders;

use App\Models\Vuelos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VueloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vuelos::factory()->count(10)->create();
    }
}
