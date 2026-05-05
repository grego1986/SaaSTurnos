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
        Schema::create('historiales_reservas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reserva_id')->constrained('reservas')->cascadeOnDelete();
            $table->foreignId('actor_id')->constrained('actores')->cascadeOnDelete();
            $table->foreignId('accion_id')->constrained('acciones')->cascadeOnDelete();
            $table->foreignId('estado_anterior_id')->constrained('estados_reservas')->cascadeOnDelete();
            $table->foreignId('estado_nuevo_id')->constrained('estados_reservas')->cascadeOnDelete();
            $table->date('fecha_anterior');
            $table->date('fecha_nueva')->nullable();
            $table->time('hora_inicio_anterior');
            $table->time('hora_inicio_nuevo')->nullable();
            $table->time('hora_fin_anterior');
            $table->time('hora_fin_nuevo')->nullable();
            $table->date('fecha_cambio')->nullable();
            $table->text('motivo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historiales_reservas');
    }
};
