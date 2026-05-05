<?php

namespace Database\Seeders;

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
            ['codigo' => 'RECORDATORIO','nombre' => 'Recordatorio'],
            ['codigo' => 'CONFIRMACION','nombre' => 'Confirmación'],
            ['codigo' => 'CANCELACION','nombre' => 'Cancelacion'],
            ['codigo' => 'SENA_PENDIENTE','nombre' => 'Seña_Pendiente']
        ]);
    }
}
