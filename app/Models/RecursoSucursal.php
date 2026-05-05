<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecursoSucursal extends Model
{
    protected $table = 'recursos_sucursales';

    protected $fillable = [
        'recurso_id',
        'sucursal_id',
        'activo',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];

    /*
    |-------------------------------------------------------------------
    | RELACIONES
    |-------------------------------------------------------------------
    */

    //Relacion 1:n con Recurso
    public function recurso()
    {
        return $this->belongsTo(Recurso::class, 'recurso_id');
    }

    //Relacion 1:n con Sucursal
    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'sucursal_id');
    }

    //Relacion 1:n con agenda_recurso
    public function agendaRecurso()
    {
        return $this->hasMany(AgendaRecurso::class, 'recurso_sucursal_id');
    }

    //Relacion 1:n con bloqueo
    public function bloqueo()
    {
        return $this->hasMany(Bloqueo::class, 'recurso_sucursal_id');
    }

    //relacion 1:n con Horario
    public function horario()
    {
        return $this->hasMany(Horario::class, 'recurso_sucursal_id');
    }

    //Relacion 1: con Recurso_Servicio
    public function recursoServicio()
    {
        return $this->hasMany(RecursoServicio::class, 'recurso_sucursal_id');
    }

    //Acceso directo a servicios (atajo)
    public function servicio()
    {
        return $this->belongsToMany(Servicio::class, 'recursos_servicios', 'recurso_sucursal_id', 'servicio_id')
            ->using(RecursoServicio::class)
            ->withPivot(['duracion_personalizada'])
            ->withTimestamps();
    }
}
