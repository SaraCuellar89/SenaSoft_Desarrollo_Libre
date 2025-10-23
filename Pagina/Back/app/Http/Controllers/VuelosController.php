<?php

namespace App\Http\Controllers;

use App\Models\Vuelos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VuelosController extends Controller
{
    // METODO PARA LISTAR VUELOS
    public function index(Request $request)
    {

        $query = Vuelos::query();

        // FILTRO DE VUELOS POR SOLO IDA O IDA Y VUELTA
        if ($request->has("tipo_vuelo")) {
            $tipo = $request->tipo_vuelo;
            $query->where('tipo_vuelo', $tipo);
        }
        // FILTRO DE VUELOS POR ORIGEN
        if ($request->has('origen')) {
            $query->where('origen', $request->origen);
        }
        // FILTRO DE VUELOS POR DESTINO
        if ($request->has('destino')) {
            $query->where('destino', $request->destino);
        }
        // OBTENEMOS LOS DATOS Y LOS MOSTRAMOS
        $datos = $query->get();
        return response()->json([
            "data" => $datos
        ]);
    }
    // METODO PARA CREAR UN VUELO
    public function store(Request $request)
    {
        // VALIDAMOS LOS VALORES ENVIADOS POR EL FOMULARIO
        $validator = Validator::make(
            $request->all(),
            [
                'avion_id' => 'required|exists:avions,id',
                'image' => 'nullable',
                'origen' => 'required|string',
                'destino' => 'required|string',
                'fecha_salida' => 'required|date',
                'fecha_llegada' => 'required|date|after:fecha_salida',
                'tipo_vuelo' => 'required|string|in:"Solo ida","Ida y vuelta"',
                'precio' => 'required|numeric'
            ]
        );
        // CONTROLAMOS EL FLUJO EN CASO DE ERROR
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()]);
        }
        // SI TODO MARCHA BIEN, CREAMOS EL VUELO
        $vuelos = Vuelos::create([
            'avion_id' => $request->avion_id,
            'image' => $request->image,
            'origen' => $request->origen,
            'destino' => $request->destino,
            'fecha_salida' => $request->fecha_salida,
            'fecha_llegada' => $request->fecha_llegada,
            'tipo_vuelo' => $request->tipo_vuelo,
            'precio' => $request->precio,
        ]);

        return response(
            [
                'message' => "VUELO CREADO EXITOSAMENTE!",
                'data' => $vuelos
            ]
        );
    }
    // METODO PARA EDITAR VUELOS
    public function update(Request $request, string $id)
    {
        // BUCAMOS EL VUELO AL QUE SE VA A EDITAR
        $vuelo = Vuelos::find($id);
        // VERIFICAMOS SI EXISTE
        if (!$vuelo) {
            return response()->json(['message' => "NO HAY VUELOS DISPONIBLES"]);
        }
        // VALIDAMOS QUE TODO ESTE CORECTO EN EL FORMULARIO
        $validator = Validator::make(
            $request->all(),
            [
                'avion_id' => 'exists:avions,id',
                'image' => 'nullable',
                'origen' => 'nullable|string',
                'destino' => 'nullable|string',
                'fecha_salida' => 'nullable|date',
                'fecha_llegada' => 'nullable|date',
                'tipo_vuelo' => 'nullable|string|in:"Solo ida","Ida y vuelta"',
                'precio' => 'nullable|numeric'
            ]
        );
        // SE HACE EL RESPECTIVO REEMPLAZO DE LOS VALORES
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()]);
        }

        if ($request->has('avion_id')) {
            $vuelo->avion_id = $request->avion_id;
        }

        if ($request->has('image')) {
            $vuelo->image = $request->image;
        }

        if ($request->has('origen')) {
            $vuelo->origen = $request->origen;
        }

        if ($request->has('destino')) {
            $vuelo->destino = $request->destino;
        }

        if ($request->has('fecha_salida')) {
            $vuelo->fecha_salida = $request->fecha_salida;
        }

        if ($request->has('fecha_llegada')) {
            $vuelo->fecha_llegada = $request->fecha_llegada;
        }

        if ($request->has('tipo_vuelo')) {
            $vuelo->tipo_vuelo = $request->tipo_vuelo;
        }

        if ($request->has('precio')) {
            $vuelo->precio = $request->precio;
        }
        // GUARDAMOS Y MOSTRAMOS
        $vuelo->save();

        return response()->json(
            [
                'message' => 'CAMBIO EXITOSO',
                'data' => $vuelo
            ]
        );
    }
    // METODO PARA ELIMINAR
    public function destroy(string $id)
    {
        // BUCAMOS EL VUELO AL QUE SE VA A EDITAR
        $vuelo = Vuelos::find($id);
        // VERIFICAMOS SI EXISTE
        if (!$vuelo) {
            return response()->json(['message' => "NO HAY VUELOS DISPONIBLES"]);
        }
        // SI HAY UNA COINCIDENCIA LO ELIMINAMOS
        $vuelo->delete();

        return response()->json(['message' => 'VUELO ELIMINADO']);
    }
}
