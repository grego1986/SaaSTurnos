<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoNotificacion extends Model
{
    protected $table = 'tipos_notificaciones';

    protected $fillable = [
        'codigo',
        'tipo',
    ];


    /*
    |--------------------------------------------------------------------
    |RELACIONES
    |--------------------------------------------------------------------
    */

    //Relacion 1:n con Notificacion
    public function notificacion ()
    {
        return $this->hasMany(Notificacion::class, 'tipo_notificacion_id');
    }

}
