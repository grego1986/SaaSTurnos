<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{

    protected $table = 'recursos';

    protected $fillable = [
        'institucion_id',
        'tipo_recurso_id',
        'nombre',
        'intervalo_minuto',
        'activo',
    ];

    protected $casts = [
        'intervalo_minuto' => 'Integer',
        'activo' => 'boolean',
    ];

     /*
    /*
    |-------------------------------------------------------------------
    | RELACIONES
    |-------------------------------------------------------------------
    */

    //relacion 1:n con Institucion
    public function institucion ()
    {
        return $this->belongsTo(Institucion::class, 'institucion_id');
    }

    //Relacion 1:n con Tipo_Recurso
    public function tipoRecurso()
    {
        return $this->belongsTo(TipoRecurso::class, 'tipo_recurso_id');
    }

    //Relacion n:m con Actor
    public function actor ()
    {
        return $this->belongsToMany(actor::class, 'actores_recursos')
        ->using(ActorRecurso::class)
        ->withPivot(['activo'])
        ->withTimestamps();
    }

    public function recursoServicio()
    {
        return $this->hasMany(RecursoServicio::class, 'recurso_id');
    }

    //relacion 1:n con Recurso_Sucursal
    public function recursoSucursal()
    {
       return $this->hasMany(RecursoSucursal::class, 'recurso_id');
    }

}
