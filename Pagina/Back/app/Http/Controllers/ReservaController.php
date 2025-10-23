<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\User;
use App\Models\Vuelos;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class ReservaController extends Controller
{
    // METODO PARA LISTAR LAS RESERVAS
    public function index()
    {
        $reserva = Reserva::all();

        if ($reserva->isEmpty()) {
            return response()->json(
                [
                    'message' => 'NO HAY RESERVAS DISPONIBLES'
                ]
            );
        }

        return response()->json(
            [
                'message' => 'LISTA DE RESERVAS',
                'data' => $reserva
            ]
        );
    }

    // METODO PARA VER TODAS LA RESERVAS RELACIONADAS CON LOS USUARIOS
    public function reservaUser()
    {
        // OBTENEMOS EL USUARIO, EL VUELO Y EL ASIENTO RELACIONADO
        $reserva = Reserva::with(['user', 'vuelo', 'asiento'])->get();

        return response()->json(['data' => $reserva]);
    }

    // METODO PARA VER LAS RESERVAS DE UN USUARIO PARCIAL
    public function reservaParcial(string $id)
    {
        // VERIFICAMOS QUE HAYA UN USUARIO
        $reservaUser = Reserva::find($id);

        if (!$reservaUser) {
            return response()->json(['message' => 'NO SE ENCONTRÓ NINGUNA RESERVA']);
        }

        // SI HAY UN USUARIO BUSCAMOS LAS RESERVAS DE ACUERDO A ELLO
        $reserva = Reserva::where('user_id', $id)
            ->with(['user', 'vuelo', 'asiento'])->get();

        return response()->json([
            'data' => $reserva
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'vuelo_id' => 'required|exists:vuelos,id',
                'asiento_id' => 'required|unique:reservas,asiento_id,|exists:asientos,id',
                'nombre_completo' => 'required|string',
                'tipo_documento' => 'required|exists:tipos_documentos,id',
                'documento' => 'required|min:8|max:11',
                'email' => "required|email|unique:users,email",
                'celular' => 'required|string|min:10',
                'metodo_id' => 'required|exists:metodos_pagos,id',
                'cantidad_reserva' => 'required|numeric|min:1|max:5'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $vuelo = Vuelos::find($request->vuelo_id);

        // if ($vuelo->fecha_salida < now()) {
        //     return response()->json(['message' => 'TU RESERVA YA CADUCÓ']);
        // }

        // DIVIDIMOS EL NOMBRE COMPLETO PARA GUARDAR EL USUARIO EN CASO DE QUE NO ESTÉ AUTENTICADO
        $partes = explode(" ", trim($request->nombre_completo));
        $primer_nombre = $partes[0];
        $segundo_nombre = $partes[1] ?? '';
        $primer_apellido = $partes[2] ?? '';
        $segundo_apellido = $partes[3] ?? '';

        $user = User::firstOrCreate([
            'rol_id' => 2,
            'name' => $primer_nombre . " " . $segundo_nombre,
            'primer_apellido' => $primer_apellido,
            'segundo_apellido' => $segundo_apellido,
            'genero' => '',
            'tipo_id' => $request->tipo_documento,
            'documento' => $request->documento,
            'celular' => $request->celular,
            'email' => $request->email,
            'password' => Hash::make('12345678')
        ]);

        $codigo = strtoupper(Str::random(8));

        $reserva = Reserva::create(
            [
                'user_id' => $user->id,
                'vuelo_id' => $request->vuelo_id,
                'asiento_id' => $request->asiento_id,
                'nombre_completo' => $request->nombre_completo,
                'tipo_documento' => $request->tipo_documento,
                'documento' => $request->documento,
                'email' => $request->email,
                'celular' => $request->celular,
                'metodo_id' => $request->metodo_id,
                'monto' => $request->monto,
                'estado' => 'pendiente',
                'codigo' => $codigo,
                'cantidad_reserva' => $request->cantidad_reserva,
            ]
        );

        return response()->json([
            'data' => $reserva
        ]);
    }

    public function show(string $id)
    {
        $reservaUser = Reserva::find($id);

        if (!$reservaUser) {
            return response()->json(['message' => 'NO SE ENCONTRÓ UNA RESERVA']);
        }

        return response()->json(
            [
                'data' => $reservaUser
            ]
        );
    }


    public function updated(string $id, Request $request)
    {
        $reserva = Reserva::find($id);

        if (!$reserva) {
            return response()->json(['message' => 'NO HAY RESERVAS']);
        }

        $validator = Validator::make(
            $request->all(),
            [
                'user_id' => 'nullable',
                'vuelo_id' => 'nullable|exists:vuelos,id',
                'asiento_id' => 'nullable|unique:reservas,asiento_id,|exists:asientos,id',
                'nombre_completo' => 'nullable|string',
                'tipo_documento' => 'nullable|exists:tipos_documentos,id',
                'documento' => 'nullable|min:8|max:11',
                'email' => "nullable|email|exists:users,email",
                'celular' => 'nullable|string|min:10',
                'metodo_id' => 'nullable|exists:metodos_pagos,id',
                'estado' => 'nullable|string|in:"confirmado","pendiente","cancelado"',
                'codigo' => 'nullable|string|unique:reservas,codigo',
                'cantidad_reserva' => 'nullable|numeric|min:1|max:5'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        if ($request->has('user_id')) {
            $reserva->user_id = $request->user_id;
        }

        if ($request->has('vuelo_id')) {
            $reserva->vuelo_id = $request->vuelo_id;
        }

        if ($request->has('asiento_id')) {
            $reserva->asiento_id = $request->asiento_id;
        }

        if ($request->has('nombre_completo')) {
            $reserva->nombre_completo = $request->nombre_completo;
        }

        if ($request->has('tipo_documento')) {
            $reserva->tipo_documento = $request->tipo_documento;
        }

        if ($request->has('documento')) {
            $reserva->documento = $request->documento;
        }

        if ($request->has('email')) {
            $reserva->email = $request->email;
        }

        if ($request->has('celular')) {
            $reserva->celular = $request->user_id;
        }

        if ($request->has('metodo_id')) {
            $reserva->metodo_id = $request->metodo_id;
        }

        if ($request->has('estado')) {
            $reserva->estado = $request->estado;
        }

        if ($request->has('codigo')) {
            $reserva->codigo = $request->codigo;
        }

        if ($request->has('cantidad_reserva')) {
            $reserva->cantidad_reserva = $request->cantidad_reserva;
        }

        $reserva->save();

        return response()->json([
            'message' => 'CAMBIO EXITOSO',
            'data' => $reserva
        ]);
    }

    public function destroy(string $id)
    {

        $reserva = Reserva::find($id);

        if (!$reserva) {
            return response()->json(['message' => 'NO HAY RESERVAS']);
        }

        $reserva->delete();

        return response()->json(['message' => 'RESERVA CANCELADA']);
    }
}
