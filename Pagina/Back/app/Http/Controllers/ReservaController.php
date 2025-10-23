<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReservaController extends Controller
{
    public function index()
    {
        $reserva = Reserva::all();

        return response()->json(
            [
                'message' => 'LISTA DE RESERVAS',
                'data' => $reserva
            ]
        );
    }

    public function reservaUser()
    {
        $reserva = Reserva::with(['user', 'vuelo', 'asiento'])->get();

        return response()->json(['data' => $reserva]);
    }


    public function reservaParcial(string $id)
    {
        $reservaUser = Reserva::find($id);

        if (!$reservaUser) {
            return response()->json(['message' => 'NO SE ENCONTRÓ UNA RESERVA']);
        }

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
                'user_id' => 'required',
                'vuelo_id' => 'required|exists:vuelos,id',
                'asiento_id' => 'required|unique:reservas,asiento_id,|exists:asientos,id',
                'nombre_completo' => 'required|string',
                'tipo_documento' => 'required|exists:tipos_documentos,id',
                'documento' => 'required|min:8|max:11',
                'email' => "required|email|exists:users,email",
                'celular' => 'required|string|min:10',
                'metodo_id' => 'required|exists:metodos_pagos,id',
                'estado' => 'required|string|in:"confirmado","pendiente","cancelado"',
                'codigo' => 'required|string|unique:reservas,codigo',
                'cantidad_reserva' => 'required|numeric|min:1|max:5'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $reserva = Reserva::create(
            [
                'user_id' => $request->user_id,
                'vuelo_id' => $request->vuelo_id,
                'asiento_id' => $request->asiento_id,
                'nombre_completo' => $request->nombre_completo,
                'tipo_documento' => $request->tipo_documento,
                'documento' => $request->documento,
                'email' => $request->email,
                'celular' => $request->celular,
                'metodo_id' => $request->metodo_id,
                'monto' => $request->monto,
                'estado' => $request->estado,
                'codigo' => $request->codigo,
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
