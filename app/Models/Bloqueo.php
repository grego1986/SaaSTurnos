<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Bloqueo extends Model
{
    protected $table = 'bloqueos';

    protected $fillable = [
        'recurso_sucursal_id',
        'tipo_bloqueo-id',
        'fecha_inicio',
        'fecha_fin',
        'hora_inicio',
        'hora_fin',
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
        'hora_inicio' => 'time',
        'hora_fin' => 'time',
    ];

    /*
    |-------------------------------------------------------------------
    | RELACIONES
    |-------------------------------------------------------------------
    */

    //Relacion 0:n con recurso_sucursal
    public function recurso_sucursal ()
    {
        return $this->belongsTo(recursosucursal::class, 'recurso_sucursal_id');
    }

    //Relacion 1:n con tipo_bloqueo
    public function tipo_bloqueo ()
    {
        return $this->belongsTo(TipoBloqueo::class, 'tipo_bloqueo_id');
    }

    /*
    |-------------------------------------------------------------------
    | Accessors
    |-------------------------------------------------------------------
    */

    //fecha formateada
    public function getFechaInicioAttribute()
    {
        return $this->fecha_inicio? Carbon::parse($this->fecha_inicio)->format('d/m/Y'):null;
    }

    public function getFechaFinAttribute()
    {
        return $this->fecha_fin? Carbon::parse($this->fecha_fin)->format('d/m/Y'):null;
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
