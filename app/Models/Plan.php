<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'planes';

    protected $fillable = [
        'nombre',
        'precio',
        'limite_profecional',
        'limite_sucurrsales',
        'recordatorio',
        'activo',
    ];

    protected $casts = [
        'precio' => 'decimal:2',
        'limite_profecional' => 'Integer',
        'limite_sucurrsales' => 'Integer',
        'recordatorio' => 'boolean',
        'activo' => 'boolean',
    ];

     /*

    /*
    |-------------------------------------------------------------------
    | RELACIONES
    |-------------------------------------------------------------------
    */

    //Relacion 1:n con Instirucion
    public function institucion ()
    {
        return $this->hasMany(Institucion::class, 'plan_id');
    }

      /*
    |-------------------------------------------------------------------
    | Accessors
    |-------------------------------------------------------------------
    */

     // Accessor para obtener el precio formateado
     public function getPrecioFormateadoAttribute()
     {
         return '$' . number_format($this->precio, 2);
     }

}
