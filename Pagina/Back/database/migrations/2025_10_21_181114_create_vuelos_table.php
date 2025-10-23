<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Enum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vuelos', function (Blueprint $table) {
            $table->id();
            $table->foreignId("avion_id")->constrained('avions')->cascadeOnDelete();
            $table->string("image")->nullable();
            $table->string("origen");
            $table->string("destino");
            $table->dateTime("fecha_salida");
            $table->dateTime("fecha_llegada");
            $table->enum("tipo_vuelo", ["solo ida", "ida y vuelta"]);
            $table->string("precio");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vuelos');
    }
};
