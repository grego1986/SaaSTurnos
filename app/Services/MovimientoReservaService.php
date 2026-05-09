<?php

namespace App\Services;

use App\Models\MovimientoReserva;
use App\Models\AgendaRecurso;
use Exception;
use Illuminate\Support\Facades\DB;

class MovimientoReservaService
{

    public static function createMovimientoReserva(AgendaRecurso $agenda, int $id)
    {
        MovimientoReserva::create([
            'historial_reserva_id' => $id,
            'fecha_reserva' => $agenda->fecha,
            'hora_inicio' => $agenda->hora_inicio,
            'hora_fin' => $agenda->hora_fin,
            'motivo' => 'Creación de reserva',
        ]);

    }

    public function updateMovimientoReserva(int $id, array $data)
    {
        // Lógica para actualizar un MovimientoReserva existente
    }

    public function deleteMovimientoReserva(int $id)
    {
        // Lógica para eliminar un MovimientoReserva
    }
}
