<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{

    protected $table = 'reservas';

    protected $fillable = [
        'agenda_recurso_id',
        'estado_reserva_id',
        'actor_id',
        'persona_id',
        'recurso_servicio_id',
        'monto_reserva',
        'monto_sena',
        'estado_sena',
        'fecha_pago_sena',
    ];

    protected $casts = [
        'monto_reserva' => 'decimal:2',
        'monto_sena' => 'decimal:2',
        'estado_sena' => 'boolean',
        'fecha_pago_sena' => 'date',
    ];

    /*
    |-------------------------------------------------------------------
    | RELACIONES
    |-------------------------------------------------------------------
    */

    //Relacion 1:n con Persona
    public Function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    //Relacion 1:n con Recurso_Servicio
    public function recursoServicio()
    {
        return $this->belongsTo(RecursoServicio::class, 'recurso_servicio_id');
    }

    // relacion 1:n con Agenda_Recurso
    public function agendaRecurso ()
    {
        return $this->belongsTo(AgendaRecurso::class, 'agenda_recurso_id');
    }

    // relacion 1:n con Actor
    public function actor ()
    {
        return $this->belongsTo(Actor::class, 'actor_id');
    }

    //Relacion 1:n con Estado_reserva
    public function estadoReserva()
    {
        return $this->belongsTo(EstadoReserva::class, 'estado_reserva_id');
    }

    // relacion 1:n con Historial_Reserva
    public function historialReserva ()
    {
        return $this->hasMany(HistorialReserva::class, 'reserva_id');
    }

    //Relacion 1:n con Notificacion
    public function notificacion ()
    {
        return $this->hasMany(Notificacion::class, 'reserva_id');
    }

      /*
    |-------------------------------------------------------------------
    | Accessors
    |-------------------------------------------------------------------
    */

  public function getFechaPagoSenaFormateadaAttribute()
    {
        return $this->fecha_pago_sena ? $this->fecha_pago_sena->format('d/m/Y') : null;
    }

}
