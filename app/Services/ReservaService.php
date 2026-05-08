<?

namespace App\Services;

use App\Models\Reserva;
use App\Models\AgendaRecurso;
use App\Models\EstadoReserva;
use App\Models\HistorialReserva;
use App\Models\Accion;
use App\Models\MovimientoReserva;
use Exception;
use Illuminate\Support\Facades\DB;

class ReservaService
{
    public function createReserva(array $data)
    {

        return DB::transaction(function () use ($data) {
            // 1. Obtener agenda
            $agenda = AgendaRecurso::where('id', $data['agenda_recurso_id'])
                ->lockForUpdate() //bloquea el registro para evitar condiciones de carrera.
                ->firstOrFail();
            // 2. Validar disponibilidad
            if (!$agenda->estaDisponible()) {
                throw new Exception('El turno no está disponible');
            }

            // 3. Crear reserva
            $reserva = Reserva::create([
                'agenda_recurso_id' => $agenda->id,
                'estado_reserva_id' => EstadoReserva::idPorCodigo('CONFIRMADA'),
                'actor_id' => $data['actor_id'],
                'persona_id' => $data['persona_id'],
                'recurso_servicio_id' => $data['recurso_servicio_id'],
                'monto_reserva' => $data['monto_reserva'] ?? null,
                'monto_sena' => $data['monto_sena'] ?? null,
                'estado_sena' => $data['estado_sena'] ?? null,
            ]);

            // 4. Actualizar agenda
            $agenda->update([
                'estado_reserva_id' => EstadoReserva::idPorCodigo('CONFIRMADA')
            ]);

            // 5. Registrar historial
            $historial = HistorialReserva::create([
                'reserva_id' => $reserva->id,
                'actor_id' => $data['actor_id'],
                'accion_id' => Accion::idPorCodigo('CREADA'),
                'estado_id' => EstadoReserva::idPorCodigo('CONFIRMADA'),
                'fecha' => now(),
            ]);

            MovimientoReserva::create([
                'historial_reserva_id' => $historial->id,
                'fecha_reserva' => $agenda->fecha,
                'hora_inicio' => $agenda->hora_inicio,
                'hora_fin' => $agenda->hora_fin,
                'motivo' => 'Creación de reserva',
            ]);

            return $reserva;
        });
    }

    public function updateReserva(int $id, array $data)
    {
        $reserva = Reserva::find($id);
        if ($reserva) {
            $reserva->update($data);
            return $reserva;
        }
        return null;
    }

    public function deleteReserva($id)
    {
        $reserva = Reserva::find($id);
        if ($reserva) {
            $reserva->delete();
            return true;
        }
        return false;
    }
}
