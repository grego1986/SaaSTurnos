<?php

namespace App\Services;

use App\Models\HistorialReserva;
use App\Models\Accion;
use App\Models\EstadoReserva;
use App\Models\Reserva;
use App\Models\AgendaRecurso;
use Exception;
use Illuminate\Support\Facades\DB;

class HistorialReservaService
{

    public static function createHistorialReserva(Reserva $reserva, AgendaRecurso $agenda, int $actorId)
    {
        $historial = HistorialReserva::create([
            'reserva_id' => $reserva->id,
            'actor_id' => $actorId,
            'accion_id' => Accion::idPorCodigo('CREADA'),
            'estado_id' => EstadoReserva::idPorCodigo('CONFIRMADA'),
            'fecha' => now(),
        ]);

        MovimientoReservaService::createMovimientoReserva($agenda, $historial->id);

        return $historial;
    }

    public function updateHistorialReserva(int $id, array $data)
    {
        // Lógica para actualizar un HistorialReserva existente
    }

    public function deleteHistorialReserva(int $id)
    {
        // Lógica para eliminar un HistorialReserva
    }
}
