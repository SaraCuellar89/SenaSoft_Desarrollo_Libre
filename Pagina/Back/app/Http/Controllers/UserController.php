<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();

        return response()->json(
            [
                'message' => 'LISTA DE USUARIOS',
                'data' => $user
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'NO SE EXISTE ESTE USUARIO']);
        }

        $validator = Validator::make(
            $request->all(),
            [
                'rol_id' => 'nullable|exists:rols,id',
                'name' => 'nullable|string|min:3',
                'primer_apellido' => 'nullable|string|min:3',
                'segundo_apellido' => 'nullable|string|min:3',
                'fecha_nacimiento' => 'nullable|date',
                'genero' => 'nullable|string',
                'tipo_id' => 'nullable|exists:tipos_documentos,id',
                'documento' => 'nullable|int|unique:users,documento',
                'edad' => 'nullable|int',
                'celular' => 'nullable|int|min:11',
                'email' => 'nullable|email|unique:users,email',
                'password' => 'nullable|min:6'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        if ($request->has('rol_id')) {
            $user->rol_id = $request->rol_id;
        }

        if ($request->has('name')) {
            $user->name = $request->name;
        }

        if ($request->has('primer_apellido')) {
            $user->primer_apellido = $request->primer_apellido;
        }

        if ($request->has('segundo_apellido')) {
            $user->segundo_apellido = $request->segundo_apellido;
        }

        if ($request->has('fecha_nacimiento')) {
            $user->fecha_nacimiento = $request->fecha_nacimiento;
        }

        if ($request->has('genero')) {
            $user->genero = $request->genero;
        }

        if ($request->has('tipo_id')) {
            $user->tipo_id = $request->tipo_id;
        }

        if ($request->has('documento')) {
            $user->documento = $request->documento;
        }

        if ($request->has('edad')) {
            $user->edad = $request->edad;
        }

        if ($request->has('celular')) {
            $user->celular = $request->celular;
        }

        if ($request->has('email')) {
            $user->email = $request->email;
        }

        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return response()->json([
            'message' => 'CAMBIO EXITOSO',
            'data' => $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'NO SE EXISTE ESTE USUARIO']);
        }

        $user->delete();

        return response()->json(['message' => 'USUARIO ELIMINADO']);
    }
}
