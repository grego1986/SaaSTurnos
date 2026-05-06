<?php

namespace Database\Seeders\catalogos;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MensajeNotificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mensajes_notificaciones')->insert([
            [
             'codigo' => 'confirmacion',
             'titulo' => 'Confirmación',
             'contenido' => 'Su turno ha sido confirmado con éxito.',
             'editable' => false
            ],
             [
             'codigo' => 'RECORDATORIO',
             'tirulo' => 'Recordatorio',
             'contenido' => 'Recuerde que su turno es pronto.',
             'editable' => false
            ],
            [
             'codigo' => 'CANCELACION',
             'tirulo' => 'Cancelación',
             'contenido' => 'Su turno ha sido cancelado con éxito.',
             'editable' => false
            ],
            [
             'codigo' => 'SENA',
             'tirulo' => 'Seña',
             'contenido' => 'Su seña no se ha registrado.',
             'editable' => false
            ]
        ]);

    }
}
