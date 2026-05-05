<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accion extends Model
{
    protected $table = 'acciones';

    protected $fillable = [
        'codigo',
        'descripcion',
    ];

    /*
    |-------------------------------------------------------------------
    | RELACIONES
    |-------------------------------------------------------------------
    */

    //una accion puede aparecer muchas veces en el historial, estado anterior.
    public function historialesReservas ()
    {
        return $this->hasMany(HistorialReserva::class, 'accion_id');
    }

     /*
    |-------------------------------------------------------------------
    | HELPERS
    |-------------------------------------------------------------------
    */

    public static function porCodigo($codigo)
    {
        return self::where('codigo', $codigo)->firstOrFail();
    }

}
