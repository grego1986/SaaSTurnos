<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoRecurso extends Model
{
    protected $table = 'tipos_recursos';

    protected $fillable = [
        'codigo',
        'tipo',
    ];

    /*
    |--------------------------------------------------------------------
    |RELACIONES
    |--------------------------------------------------------------------
    */

    // Relacion 1:n con Recurso
    public function recurso()
    {
        return $this->hasMany(Recurso::class, 'tipo_recurso_id');
    }
}
