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
        Schema::create('recursos_servicios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recurso_sucursal_id')->constrained('recursos_sucursales')->cascadeOnDelete();
            $table->foreignId('servicio_id')->constrained('servicios')->cascadeOnDelete();
            $table->integer('duracion_personalizada')->nullable();
            $table->unique(['recurso_sucursal_id', 'servicio_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recursos_servicios');
    }
};
