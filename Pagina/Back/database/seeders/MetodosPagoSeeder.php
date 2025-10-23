<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetodosPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('metodos_pagos')->insert([
            ["metodo_pago" => "Tarjeta de crédito"],
            ["metodo_pago" => "Tarjeta de débito"],
            ["metodo_pago" => "PSE"],
        ]);
    }
}
