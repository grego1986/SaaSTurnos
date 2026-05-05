<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Institucion extends Model
{
    protected $table = 'instituciones';

    protected $fillable = [
        'plan_id',
        'nombre',
        'slug',
        'descripcion',
        'suscripcion_activa',
        'fecha_vencimiento',
        'estado',
    ];

    protected $casts = [
        'suscripcion-activa' => 'boolean',
        'estado' => 'boolean',
        'fecha_vencimiento' => 'datatime',
    ];

    /*
    |--------------------------------------------------------------------
    |RELACIONES
    |--------------------------------------------------------------------
    */

    //relacon 1:n con Plan
    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }

    //Una institucion tiene muchas sucursales
    public function sucursal ()
    {
        return $this->hasMany(Sucursal::class, 'institucion_id');
    }

    // Recursos (canchas, peluqueros, etc)
    public function recurso ()
    {
        return $this->hasMany(Recurso::class, 'institucion_id');
    }

    // Servicios que ofrece la institucion
    public function servicio ()
    {
        return $this->hasMany(Servicio::class, 'institucion_id');
    }

    /*
    |-------------------------------------------------------------------
    | HELPERS (MUY UTILES)
    |-------------------------------------------------------------------
    */

    public function estaActiva ()
    {
       return $this->estado && $this->suscripcion_activa;
    }

    public function suscripcionVencida ()
    {
        if (!$this->fecha_vencimiento){
            return false;
        }

        return now()->greaterThan($this->fecha_vencimiento);
    }

      /*
    |-------------------------------------------------------------------
    | Accessors
    |-------------------------------------------------------------------
    */

    public function getFechaVencimientoAttribute()
    {
        return $this->attributes['fecha_vencimiento'] ? Carbon::parse($this->attributes['fecha_vencimiento'])->format('Y-m-d') : null;
    }
}
