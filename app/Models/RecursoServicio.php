<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecursoServicio extends Model
{
    protected $table = 'recursos_servicios';

    protected $fillable = [
        'recurso_sucursal_id',
        'servicio_id',
        'duracion_personalizada',
    ];

    protected $casts = [
        'duracion_personalizada' => 'Integer',
    ];

    /*
    |-------------------------------------------------------------------
    | RELACIONES
    |-------------------------------------------------------------------
    */

    //Relacion 1:n con recurso_Sucursal
    public function recursoSucursal()
    {
        return $this->belongsTo(RecursoSucursal::class, 'recurso_sucursal_id');
    }

    //relacion 1:n con Servicio
    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'servicio_id');
    }

    //Relacion 1:n con Reserva
    public function reserva()
    {
        return $this->hasMany(Reserva::class, 'recurso_servicio_id');
    }
}
