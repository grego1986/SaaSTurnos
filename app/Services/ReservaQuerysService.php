<?

namespace App\Services;

use App\Models\Reserva;
use app\Models\Persona;
use Carbon\Carbon;

class ReservaQuerysService
{
    //obtenes reserva por id con relaciones
    public function obtenerReservasPorId(int $id)
    {
        return Reserva::with([
            'persona',
            'agenda_recurso',
            'estado_reserva',
            'actor'
        ])->findOrFail($id);
    }

    //obtener reservas por fecha
    public function porFecha(Carbon $fecha)
    {
        return Reserva::whereHas('agenda_recurso', function ($q) use ($fecha) {
            $q->where('fecha', $fecha);
        })->get();
    }

    //obtener reservas por rango de fechas
    public function porRango(Carbon $desde, Carbon $hasta)
    {
        return Reserva::whereHas('agenda_recurso', function ($q) use ($desde, $hasta) {
            $q->whereBetween('fecha', [$desde, $hasta]);
        })->get();
    }

    //obtener reservas por persona
    public function porPersona(Persona $persona)
    {
        return Reserva::where('persona_id', $persona->id)->get();
    }

    //obtener reservas por recurso
    public function porRecurso(int $recursoId)
    {
        return Reserva::whereHas('agenda_recurso.recursoSucursal', function ($q) use ($recursoId) {
            $q->where('recurso_id', $recursoId);
        })->get();
    }

    //obtener reservas por estado
    public function buscar(array $filtros)
    {
        $query = Reserva::query()->with([
            'persona',
            'agenda_recurso',
            'estado_reserva'
        ]);

        if (!empty($filtros['persona_id'])) {
            $query->where('persona_id', $filtros['persona_id']);
        }

        if (!empty($filtros['fecha'])) {
            $query->whereHas('agenda_recurso', function ($q) use ($filtros) {
                $q->where('fecha', $filtros['fecha']);
            });
        }

        if (!empty($filtros['estado'])) {
            $query->whereHas('estado_reserva', function ($q) use ($filtros) {
                $q->where('codigo', $filtros['estado']);
            });
        }

        return $query->get();
    }
}
