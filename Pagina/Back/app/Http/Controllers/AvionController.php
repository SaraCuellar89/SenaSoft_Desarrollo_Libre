<?php

namespace App\Http\Controllers;

use App\Models\Avion;
use Illuminate\Http\Request;

class AvionController extends Controller
{
    public function index()
    {
        $avion = Avion::all();

        return response()->json([
            "data" => $avion
        ]);
    }
}
