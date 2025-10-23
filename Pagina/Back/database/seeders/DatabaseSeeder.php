<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(
            [
                RolSeeder::class,
                TiposDocumentoSeeder::class,
                MetodosPagoSeeder::class,
                AvionSeeder::class,
                VueloSeeder::class
            ]
        );

        User::factory()->create([
            'rol_id' => '1',
            'name' => 'Andres Oswaldo',
            'primer_apellido' => "Echeverria",
            'segundo_apellido' => "Vasquez",
            'fecha_nacimiento' => "2003/04/10",
            'genero' => "M",
            'tipo_id' => "3",
            'documento' => "5314051",
            'edad' => "22",
            'celular' => "3103029788",
            'email' => 'andres@gmail.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
