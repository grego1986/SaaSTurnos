<?php

namespace Database\Seeders\catalogos;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoNotificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipos_notificaciones')->insert([
            ['codigo' => 'RECORDATORIO','tipo' => 'Recordatorio'],
            ['codigo' => 'CONFIRMACION','tipo' => 'Confirmación'],
            ['codigo' => 'CANCELACION','tipo' => 'Cancelacion'],
            ['codigo' => 'SENA_PENDIENTE','tipo' => 'Seña_Pendiente']
        ]);
    }
}
