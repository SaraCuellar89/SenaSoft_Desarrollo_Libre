<?php

namespace App\Http\Controllers;

use App\Models\Avion;
use Illuminate\Http\Request;

class AvionController extends Controller
{
    // METODO PARA LISTAR TODOS LOS AVIONES DISPONIBLES
    public function index()
    {
        $avion = Avion::all();

        if ($avion->isEmpty()) {
            return response()->json([
                "message" => 'NO HAY AVIONES DISPONIBLES'
            ]);
        }

        return response()->json([
            "data" => $avion
        ]);
    }
}
