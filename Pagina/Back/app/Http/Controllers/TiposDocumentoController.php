<?php

namespace App\Http\Controllers;

use App\Models\Tipos_documento;
use Illuminate\Http\Request;

class TiposDocumentoController extends Controller
{
    public function index()
    {
        $tipos = Tipos_documento::all();

        return response()->json([
            "data" => $tipos
        ]);
    }
}
