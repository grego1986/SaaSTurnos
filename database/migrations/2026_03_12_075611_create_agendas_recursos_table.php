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
        Schema::create('agendas_recursos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recurso_sucursal_id')->constrained('recursos_sucursales')->cascadeOnDelete();
            $table->date('fecha');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->foreignId('estado_reserva_id')->constrained('estados_reservas')->cascadeOnDelete();
            $table->unique(['recurso_sucursal_id', 'fecha', 'hora_inicio']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendas_recursos');
    }
};
