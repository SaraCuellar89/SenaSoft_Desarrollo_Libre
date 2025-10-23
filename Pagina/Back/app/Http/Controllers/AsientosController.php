<?php

namespace App\Http\Controllers;

use App\Models\Asientos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AsientosController extends Controller
{

    public function index()
    {
        $asiento = Asientos::all();

        return response()->json([
            'data' => $asiento
        ]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'asiento' => 'required|string|unique:asientos',
            'estado' => "required"
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $asiento = Asientos::create([
            'asiento' => $request->asiento,
            'estado' => $request->estado,
        ]);

        return response()->json([
            'data' => $asiento
        ]);
    }
}
