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
        Schema::create('notificaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reserva_id')->constrained('reservas')->cascadeOnDelete();
            $table->foreignId('persona_id')->constrained('personas')->cascadeOnDelete();
            $table->foreignId('tipo_notificacion_id')->constrained('tipos_notificaciones')->cascadeOnDelete();
            $table->foreignId('canal_id')->constrained('canales')->cascadeOnDelete();
            $table->foreignId('mensase_notificacion_id')->constrained('mensajes_notificaciones')->cascadeOnDelete();
            $table->datetime('fecha_programada')->nullable();
            $table->datetime('fecha_enviada')->nullable();
            $table->boolean('enviada')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificaciones');
    }
};
