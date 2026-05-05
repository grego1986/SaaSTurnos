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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            // 🔹 Multi-tenant (institución / cuenta)
            $table->foreignId('institucion_id')->constrained('instituciones')->cascadeOnDelete();
            // 🔹 Tipo de evento (reserva_creada, usuario_registrado, etc)
            $table->string('tipo', 100);
            // 🔹 Entidad principal afectada (polimórfico simple)
            $table->string('entidad_tipo', 100);
            $table->unsignedBigInteger('entidad_id');
            // 🔹 Actor (quién ejecuta la acción)
            $table->foreignId('actor_id')->nullable()->constrained('actores')->nullOnDelete();
            // 🔹 Usuario final (opcional, útil para analytics/IA)
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            // 🔹 Reserva (atajo directo, MUY útil en tu caso)
            $table->foreignId('reserva_id')->nullable()->constrained('reservas')->cascadeOnDelete();
            // 🔹 Canal/origen (web, api, whatsapp, etc)
            $table->foreignId('canal_id')->nullable()->constrained('canales')->nullOnDelete();
            // 🔹 Metadata flexible (IA / integraciones)
            $table->jsonb('payload')->nullable();
            // 🔹 Estado de procesamiento (automatizaciones)
            $table->timestamp('procesado_at')->nullable();
            $table->timestamps();

            // 🔥 Índices clave
            $table->index(['institucion_id', 'tipo']);
            $table->index(['entidad_tipo', 'entidad_id']);
            $table->index('reserva_id');
            $table->index('procesado_at');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
