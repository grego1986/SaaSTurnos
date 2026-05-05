<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoReserva extends Model
{

    protected $table = 'estados_reservas';

    protected $fillable = [
        'codigo',
        'estado',
    ];

    /*
    |-------------------------------------------------------------------
    | RELACIONES
    |-------------------------------------------------------------------
    */

    //Relacion 1:n agenda_recurso
    public function agendarecurso()
    {
        return $this->hasMany(AgendaRecurso::class, 'estado_reserva_id');
    }

    //relacion 1:n historial_reserva 'estado_anterior'
    public function historialesComoAnterior()
    {
        return $this->hasMany(HistorialReserva::class, 'estado_anterior_id');
    }

    //relacion 1:n historial_reserva 'estado_nuevo'
    public function historialesComoNuevo()
    {
        return $this->hasMany(HistorialReserva::class, 'estado_nuevo_id');
    }

    //relacion 1:n con Reserva
    public function reserva()
    {
        return $this->hasMany(Reserva::class, 'estado_reserva_id');
    }

}
