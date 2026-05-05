<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Canal extends Model
{
    protected $table = 'canales';

    protected $fillable = [
        'codigo',
        'canal',
    ];

    /*
    |-------------------------------------------------------------------
    | RELACIONES
    |-------------------------------------------------------------------
    */

    //Relacion 1:n con notificacion
    public function notificacion ()
    {
        return $this->hasMany(Notificacion::class, 'canal_id');
    }
}
