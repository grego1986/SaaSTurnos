<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos';

    protected $fillable = [
        'institucion_id',
        'tipo',
        'entidad_tipo',
        'entidad_id',
        'actor_id',
        'user_id',
        'reserva_id',
        'origen',
        'payload',
        'procesado_at'
    ];

    protected $casts = [
        'payload' => 'array',
        'procesado_at' => 'datetime',
    ];


    // Relaciones
    public function institucion()
    {
        return $this->belongsTo(Institucion::class, 'institucion_id');
    }

    public function actor()
    {
        return $this->belongsTo(Actor::class, 'actor_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reserva()
    {
        return $this->belongsTo(Reserva::class, 'reserva_id');
    }

    // Relación polimórfica manual
    public function entidad()
    {
        return match ($this->entidad_tipo) {
            'reserva' => Reserva::find($this->entidad_id),
            'persona' => Persona::find($this->entidad_id),
            default => null,
        };
    }

    /*
    |-------------------------------------------------------------------
    | Accessors
    |-------------------------------------------------------------------
    */

    public function getprocesadoAttribute()
    {
        return !is_null($this->procesado_at);
    }

}

