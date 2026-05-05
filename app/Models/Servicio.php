<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios';

    protected $fillable = [
        'institucion_id',
        'nombre',
        'duracion_minutos',
        'usa_sena',
        'tipo_sena',
        'valor_sena',
        'confirmacion_sena',
        'activo',
    ];

    protected $casts = [
        'duracion_minutos' => 'integer',
        'usa_sena' => 'boolean',
        'confirmacion_sena' => 'boolean',
        'activo' => 'boolean',
        'valor_sena' => 'decimal:2',
    ];

     /*
    |-------------------------------------------------------------------
    | RELACIONES
    |-------------------------------------------------------------------
    */

    //relacion 1:n con Institucion
    public function institucion ()
    {
        return $this->belongsTo(Institucion::class, 'institucion_id');
    }

    //relacion 1:n con Recurso_Servicio
    public function recursoServicio()
    {
        return $this->hasMany(RecursoServicio::class, 'servicio_id');
    }

}
