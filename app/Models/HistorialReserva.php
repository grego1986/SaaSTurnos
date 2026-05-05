<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class HistorialReserva extends Model
{

    protected $table = 'historiales_reservas';

    protected $fillable = [
        'reserva_id',
        'actor_id',
        'accion_id',
        'estado_anterior_id',
        'estado_nuevo_id',
        'fecha_anterior',
        'fecha_nueva',
        'hora_inicio_anterior',
        'hora_inicio_nuevo',
        'hora_fin_anterior',
        'hora_fin_nuevo',
        'fecha_cambio',
        'motivo',
    ];

    protected $casts = [
        'fecha_cambio' => 'date',
        'hora_inicio_anterior' => 'time',
        'hora_inicio_nuevo' => 'time',
        'hora_fin_anterior' => 'time',
        'hora_fin_nuevo' => 'time',
        'fecha_anterior' => 'date',
        'fecha_nueva' => 'date',
    ];

    /*
    |-------------------------------------------------------------------
    | RELACIONES
    |-------------------------------------------------------------------
    */

    //Relacion 1:n con estado_reserva estado anterior
    public function estado_reserva_anterior()
    {
        return $this->belongsTo(EstadoReserva::class, 'estado_anterior_id');
    }

    //Relacion 1:n con estado_reserva estado nuevo
    public function estado_reserva_nuevo()
    {
        return $this->belongsTo(EstadoReserva::class, 'estado_nuevo_id');
    }

    //Relacion 1:n con Actor
    public function actor ()
    {
        return $this->belongsTo(Actor::class, 'actor_id');
    }

    //recion 1:n con accion
    public function accion ()
    {
        return $this->belongsTo(Accion::class, 'accion_id');
    }

    //relacion 1:n con reserva
    public function reserva ()
    {
        return $this->belongsTo(reserva::class, 'reserva_id');
    }

    /*
    |-------------------------------------------------------------------
    | Accessors
    |-------------------------------------------------------------------
    */

    public function getFechaCambioAttribute()
    {
        return $this->fecha_cambio? Carbon::parse($this->fecha_cambio)->format('d/m/Y'):null;
    }

    public function getFechaAnteriorAttribute()
    {
        return $this->fecha_anterior? Carbon::parse($this->fecha_anterior)->format('d/m/Y'):null;
    }

    public function getFechaNuevaAttribute()
    {
        return $this->fecha_nueva? Carbon::parse($this->fecha_nueva)->format('d/m/Y'):null;
    }

    public function getHoraInicioAnteriorAttribute()
    {
        return $this->hora_inicio_anterior? Carbon::parse($this->hora_inicio_anterior)->format('H:i'):null;
    }

    public function getHoraInicioNuevoAttribute()
    {
        return $this->hora_inicio_nuevo? Carbon::parse($this->hora_inicio_nuevo)->format('H:i'):null;
    }

    public function getHoraFinAnteriorAttribute()
    {
        return $this->hora_fin_anterior? Carbon::parse($this->hora_fin_anterior)->format('H:i'):null;
    }

    public function getHoraFinNuevoAttribute()
    {
        return $this->hora_fin_nuevo? Carbon::parse($this->hora_fin_nuevo)->format('H:i'):null;
    }
}
