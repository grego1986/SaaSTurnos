<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ActorRecurso extends Pivot
{
    protected $table = 'actores_recursos';

    protected $fillable = [
        'actor_id',
        'recurso_id',
        'activo',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELACIONES
    |--------------------------------------------------------------------------
    */

    public function actor()
    {
        return $this->belongsTo(Actor::class, 'actor_id');
    }

    public function recurso()
    {
        return $this->belongsTo(Recurso::class. 'recurso_id');
    }

    /*
    |--------------------------------------------------------------------------
    | HELPERS
    |--------------------------------------------------------------------------
    */

    public function esActivo()
    {
        return $this->activo;
    }
}
