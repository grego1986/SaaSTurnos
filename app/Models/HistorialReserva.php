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
        'estado_id',
        'fecha',
    ];

    protected $casts = [
        'fecha' => 'date',
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

    //Relacion 1:1 con movimiento reserva
    public function movimiento_reserva()
    {
        return $this->hasOne(MovimientoReserva::class, 'historial_reserva_id');
    }

    /*
    |-------------------------------------------------------------------
    | Accessors
    |-------------------------------------------------------------------
    */

    public function getFechaAttribute()
    {
        return $this->fecha? Carbon::parse($this->fecha)->format('d/m/Y'):null;
    }
}
