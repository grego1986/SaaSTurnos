<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Notificacion extends Model
{
    protected $table = 'notificaciones';

    protected $fillable = [
        'reserva_id',
        'persona_id',
        'tipo_notificacion_id',
        'canal_id',
        'mensaje_notificacion_id',
        'fecha_programada',
        'fecha_enviada',
        'enviada',
    ];

    protected $casts = [
        'enviada' => 'boolean',
        'fecha_programada' => 'datetime',
        'fecha_enviada' => 'datetime',
    ];

    /*
    |-------------------------------------------------------------------
    | RELACIONES
    |-------------------------------------------------------------------
    */

    //Relacion 1:n con canal
    public function canal ()
    {
        return $this->belongsTo(Canal::class);
    }

    //Relacion 1:n con Persona
    public function persona ()
    {
        return $this->belongsTo(Persona::class);
    }

    //Relacion 1:n con Tipo_Notificacion
    public function tipoNotificacion ()
    {
        return $this->belongsTo(TipoNotificacion::class);
    }

    //Relacion 1:n con Mensaje_Notificacion
    public function mensajeNotificacion ()
    {
        return $this->belongsTo(MensajeNotificacion::class);
    }

    //Relacion 1:n con Reserva
    public function reserva ()
    {
        return $this->belongsTo(Reserva::class, 'reserva_id');
    }

    /*
    |-------------------------------------------------------------------
    | Accessors
    |-------------------------------------------------------------------
    */

    public function getFechaProgramadaAttribute()
    {
        return $this->attributes['fecha_programada'] ? Carbon::parse($this->attributes['fecha_programada'])->format('Y-m-d H:i:s') : null;
    }

    public function getFechaEnviaAttribute()
    {
        return $this->attributes['fecha_enviada'] ? Carbon::parse($this->attributes['fecha_enviada'])->format('Y-m-d H:i:s') : null;
    }

}
