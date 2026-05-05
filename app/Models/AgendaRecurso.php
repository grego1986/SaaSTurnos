<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class AgendaRecurso extends Model
{
    protected $table = 'agenda_recursos';

    protected $fillable = [
        'recurso_sucursal_id',
        'fecha',
        'hora_inicio',
        'hora_fin',
        'estado_reserva_id',
    ];

    protected $casts = [
        'fecha' => 'date',
        'hora_inicio' => 'time',
        'hora_fin' => 'time',
    ];


    /*
    |-------------------------------------------------------------------
    | RELACIONES
    |-------------------------------------------------------------------
    */

    //Relacion 1:n con Recurso_Sucursal
    public function recursosSucursales()
    {
        return $this->belongsTo(RecursoSucursal::class, 'recurso_sucursal_id');
    }

    //Relacion 1:n con Reserva
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'agenda_recurso_id');
    }

    //Relacion 1:n con Estado_Reserva
    public function estadosReservas()
    {
        return $this->belongsTo(EstadoReserva::class, 'estado_reserva_id');
    }

    /*
    |-------------------------------------------------------------------
    | Accessors
    |-------------------------------------------------------------------
    */

    //fecha formateada
    public function getFechaFormatAttribute()
    {
        return $this->fecha? Carbon::parse($this->fecha)->format('d/m/Y'):null;
    }

    //horas formateada
    public function getHoraInicioAttribute()
    {
        return $this->hora_inicio? Carbon::parse($this->hora_inicio)->format('H:i'):null;
    }

    public function getHoraFinAttribute()
    {
        return $this->hora_fin? Carbon::parse($this->hora_fin)->format('H:i'):null;
    }

}
