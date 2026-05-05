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
            $table->foreignId('agenda_recurso_id')->constrained('agendas_recursos')->cascadeOnDelete();
            $table->foreignId('estado_reserva_id')->constrained('estados_reservas')->cascadeOnDelete();
            $table->foreignId('actor_id')->constrained('actores')->cascadeOnDelete();
            $table->foreignId('persona_id')->constrained('personas')->cascadeOnDelete();
            $table->foreignId('recurso_servicio_id')->constrained('recursos_servicios')->cascadeOnDelete();
            $table->decimal('monto_reserva', 8, 2)->nullable();
            $table->decimal('monto_sena', 8, 2)->nullable();
            $table->string('estado_sena')->nullable();
            $table->date('fecha_pago_sena')->nullable();
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
