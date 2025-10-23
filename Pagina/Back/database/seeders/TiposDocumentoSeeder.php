<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipos_documentos')->insert(
            [
                ["tipo" => "Tarjeta de Identidad"],
                ["tipo" => "Cedúla de Ciudadanía"],
                ["tipo" => "PPT"],
                ["tipo" => "Pasaporte"],
            ]
        );
    }
}
