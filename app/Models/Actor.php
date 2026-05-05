<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $table = 'actores';

    protected $fillable = [
        'persona_id',
        'creado',
    ];

    protected $casts = [
        'creado' => 'date',
    ];

    /*
    |-------------------------------------------------------------------
    | RELACIONES
    |-------------------------------------------------------------------
    */

    //relacion 1:n con Personas
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    //relacion n:m con recursos
    public function recursos()
    {
        return $this->belongsToMany(Recurso::class, 'actores_recursos', 'actor_id', 'recurso_id')
        ->using(ActorRecurso::class)
        ->withPivot(['activo'])
        ->withTimestamps();
    }

    //relacion n:m con Rol
    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'actores_roles', 'actor_id', 'rol_id')
        ->withTimestamps();
    }


    //relacion n:m con Sucursal
    public function sucursales()
    {
        return $this->belongsToMany(Sucursal::class, 'sucursales_actores', 'actor_id', 'sucursal_id')
        ->withTimestamps();
    }

    //relacion 1:n con Historial_Reserva
    public function historialesReservas()
    {
        return $this->hasMany(HistorialReserva::class, 'actor_id');
    }

    //relacion 1:n con Reserva
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'actor_id');
    }

    /*
    |-------------------------------------------------------------------
    | Accessors
    |-------------------------------------------------------------------
    */

    //fecha formateada
    public function getFechaFormateadaAttribute()
    {
        return $this->creado? Carbon::parse($this->creado)->format('d/m/Y'):null;
    }

}
