<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'codigo',
        'rol',
    ];


    /*
    |-------------------------------------------------------------------
    | RELACIONES
    |-------------------------------------------------------------------
    */

    public function actor()
    {
        return $this->belongsToMany(Actor::class, 'actores_roles')
        ->withTimestamps();
    }

}
