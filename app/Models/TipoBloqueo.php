<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoBloqueo extends Model
{
    protected $table ='tipos_bloqueos';

    protected $fillable = [
        'codigo',
        'tipo_bloqueo',
    ];

    /*
    |-------------------------------------------------------------------
    | RELACIONES
    |-------------------------------------------------------------------
    */

    //relacion 1:n con bloqueo
    public function bloqueo ()
    {
        return $this->hasMany(Bloqueo::class, 'tipo_bloqueo_id');
    }

}
