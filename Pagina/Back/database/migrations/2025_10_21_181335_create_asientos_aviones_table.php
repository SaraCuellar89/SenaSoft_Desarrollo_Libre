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
        Schema::create('asientos_aviones', function (Blueprint $table) {
            $table->foreignId('asiento_id')->constrained('asientos')->cascadeOnDelete();
            $table->foreignId('avion_id')->constrained('avions')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asientos_aviones');
    }
};
