<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('vuelo_id')->constrained('vuelos')->cascadeOnDelete();
            $table->foreignId('asiento_id')->constrained('asientos')->cascadeOnDelete();
            $table->string("nombre_completo");
            $table->string("tipo_documento");
            $table->string("documento");
            $table->string("email");
            $table->string("celular");
            $table->foreignId("metodo_id")->constrained('metodos_pagos')->cascadeOnDelete();
            $table->double("monto");
            $table->string("estado");
            $table->string("codigo");
            $table->string("cantidad_reserva");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
