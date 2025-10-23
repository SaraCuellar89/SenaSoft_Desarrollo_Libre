<?php

namespace Database\Seeders;

use App\Models\Asientos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AsientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Asientos::factory()->count(72)->create();
    }
}
