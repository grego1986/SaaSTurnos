<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Horario extends Model
{
    protected $table = 'horarios';

    protected $fillable = [
        'recurso_sucursal_id',
        'dia_semana',
        'hora_inicio',
        'hora_fin',
        'activo',
    ];

    protected $Cast = [
        'dia_semana' => 'unsignedTinyInteger',
        'hora_inicio' => 'time',
        'hora_fin' => 'time',
        'activo' => 'boolean',
    ];


     /*
    |-------------------------------------------------------------------
    | RELACIONES
    |-------------------------------------------------------------------
    */

    //relacion 1:n con Recurso_Sucursal
    public function recurso_sucursal ()
    {
        return $this->belongsTo(RecursoSucursal::class, 'recurso_sucursal_id');
    }

    /*
    |-------------------------------------------------------------------
    | Accessors
    |-------------------------------------------------------------------
    */

    public function getHoraInicioAttribute()
    {
        return $this->hora_inicio? Carbon::parse($this->hora_inicio)->format('H:i'):null;
    }

    public function getHoraFinAttribute()
    {
        return $this->hora_fin? Carbon::parse($this->hora_fin)->format('H:i'):null;
    }

    public function getDiaSemanaAttribute()
    {
            $dias = [
                0 => 'Domingo',
                1 => 'Lunes',
                2 => 'Martes',
                3 => 'Miércoles',
                4 => 'Jueves',
                5 => 'Viernes',
                6 => 'Sábado',
            ];

            return $dias[$this->attributes['dia_semana']] ?? null;
    }

}
