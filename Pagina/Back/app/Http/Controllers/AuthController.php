<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'rol_id' => 'required|exists:rols,id',
                'name' => 'required|string|min:3',
                'primer_apellido' => 'required|string|min:3',
                'segundo_apellido' => 'required|string|min:3',
                'fecha_nacimiento' => 'required|date',
                'genero' => 'required|string',
                'tipo_id' => 'required|exists:tipos_documentos,id',
                'documento' => 'required|int|unique:users,documento',
                'edad' => 'required|int',
                'celular' => 'required|int|min:11',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $user = User::create([
            'rol_id' => $request->rol_id,
            'name' => $request->name,
            'primer_apellido' => $request->primer_apellido,
            'segundo_apellido' => $request->segundo_apellido,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'genero' => $request->genero,
            'tipo_id' => $request->tipo_id,
            'documento' => $request->documento,
            'edad' => $request->edad,
            'celular' => $request->celular,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => "USUARIO CREADO CON EXITOS",
            'data' => $user
        ]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email|exists:users,email',
                'password' => 'required|min:6'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(
                [
                    'message' => 'CREDENCIALES INCORRECTAS'
                ]
            );
        }

        $user = Auth::user();

        $token = $user->createToken("auth:token")->plainTextToken;

        return response()->json(
            [
                'message' => 'INICIO DE SESSION EXITOSO',
                'data' => $user,
                'token' => $token
            ]
        );
    }

    public function logout(Request $request)
    {

        $request->user()->currentAccessToken()->delete();

        return response()->json(
            [
                'message' => 'SESSION CERRADA'
            ]
        );
    }
}
