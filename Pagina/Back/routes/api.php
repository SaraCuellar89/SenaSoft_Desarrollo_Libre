<?php

use App\Http\Controllers\AsientosController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AvionController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\TiposDocumentoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VuelosController;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// ENDPOINT PARA EL REGISTRO DE USUARIO
Route::post('register', [AuthController::class, 'register']);

// ENDPOINT PARA EL INICIO DE SESSION
Route::post('login', [AuthController::class, 'login']);

// ENDPOINT PARA OBTENER LA LISTA DE AVIONES
Route::get('aviones', [AvionController::class, 'index']);

// ENDPOINT PARA LISTAR LOS ROLES EN EL COMBOBOX
Route::get('roles', [RolController::class, 'index']);

// ENDPOINT PARA LISTAR LOS TIPOS DE DOCUMENTO EN EL COMBOBOX
Route::get('tipos', [TiposDocumentoController::class, 'index']);

// ENDPOINT PARA GESTIONAR VUELOS (GET, POST, PUT, DELETE)
Route::apiResource('vuelos', VuelosController::class);

// ENDPOINT PARA GESTIONAR LAS RESERVAR (GET, POST, PUT, DELETE)
Route::apiResource('reservas', ReservaController::class);

// ENDPOINT PARA VER TODAS LA RESERVAS RELACIONADAS A UN USUARIO
Route::get('reservaUser', [ReservaController::class, "reservaUser"]);

// ENDPOINT PARA VER LAS RESERVAS DE UN USUARIO PARCIAL
Route::get('reservaParcial/{id}', [ReservaController::class, "reservaParcial"]);

// ENDPOINT PARA LISTAR USUARIOS, EDITAR Y ELIMINAR
Route::apiResource('users', UserController::class);

// ENDPOINT PARA GESTIONAR ASIENTOS (GET, POST, PUT, DELETE)
Route::apiResource('asientos', AsientosController::class);

// RUTAS PROTEGITAS
Route::middleware('auth:sanctum')->group(function () {

    // ENDPOINT PARA CERRAR SESSION
    Route::get('logout', [AuthController::class, 'logout']);
});
