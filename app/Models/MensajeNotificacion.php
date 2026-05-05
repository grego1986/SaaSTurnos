<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MensajeNotificacion extends Model
{

    protected $table = 'mensajes_notificaciones';

    protected $fillable = [
        'codigo',
        'titulo',
        'contenido',
        'editable',
    ];

    protected $casts = [
        'editable' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------
    |RELACIONES
    |--------------------------------------------------------------------
    */

    //Relacion 1:n con Notificacion
    public function notificacion ()
    {
        return $this->hasMany(Notificacion::class, 'mensaje_notificacion_id');
    }

}
