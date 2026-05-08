<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class MovimientoReserva extends Model
{
    protected $table = 'movimientos_reservas';

    protected $fillable = [
        'historial_reserva_id',
        'fecha_reserva',
        'hora_inicio',
        'hora_fin',
        'motivo',
    ];

    protected $casts = [
        'fecha_reserva' => 'date',
        'hora_inicio' => 'time',
        'hora_fin' => 'time',
    ];

    /*
    |-------------------------------------------------------------------
    | RELACIONES
    |-------------------------------------------------------------------
    */

    //Relacion 1:1 con historial reserva
    public function historial_reserva()
    {
        return $this->belongsTo(HistorialReserva::class, 'historial_reserva_id');
    }

    /*
    |-------------------------------------------------------------------
    | Accessors
    |-------------------------------------------------------------------
    */

    public function getFechaReservaAttribute()
    {
        return $this->fecha_reserva? Carbon::parse($this->fecha_reserva)->format('d/m/Y'):null;
    }

    public function getHoraInicioAttribute()
    {
        return $this->hora_inicio? Carbon::parse($this->hora_inicio)->format('H:i'):null;
    }

    public function getHoraFinAttribute()
    {
        return $this->hora_fin? Carbon::parse($this->hora_fin)->format('H:i'):null;
    }

}
