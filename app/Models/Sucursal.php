<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table = 'sucursales';

    protected $fillable = [
        'institucion_id',
        'nombre',
        'direccion',
        'latitud',
        'longitud',
        'telefono',
        'whatsapp',
        'email',
        'activa',
    ];

    protected $casts = [
        'latitud' => 'decimal:8',
        'longitud' => 'decimal:8',
        'activa' => 'boolean',
    ];

    /*
    |-------------------------------------------------------------------
    | RELACIONES
    |-------------------------------------------------------------------
    */

    //relcio 1:n con Institucion
    public function institucion ()
    {
        return $this->belongsTo(Institucion::class, 'institucion_id');
    }

    //relacion n:n con Actor pivot
    public function actor ()
    {
        return $this->belongsToMany(Actor::class, 'sucursales_actores', 'sucursal_id', 'actor_id')
        ->withTimestamps();
    }

    //Relacion 1:n con Recurso_Sucursal
    public function recursoSucursal()
    {
        return $this->hasMany(RecursoSucursal::class, 'sucursal_id');
    }

}
