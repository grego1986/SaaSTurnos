<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'personas';

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'whatsapp',
        'activo',
    ];

    /*
    |-------------------------------------------------------------------
    | RELACIONES
    |-------------------------------------------------------------------
    */

    //Relacion 1:n con Actor
    public function actor()
    {
        return $this->hasMany(Actor::class);
    }

    //Relacion 1:n con Notificacion
    public function notificacion()
    {
        return $this->hasMany(Notificacion::class);
    }

    //Relacion 1:1 con User
    public function user()
    {
        return $this->hasOne(User::class);
    }

    //Relacion 1:n con Reserva
    public function reserva()
    {
        return $this->hasMany(reserva::class, 'persona_id');
    }

}
