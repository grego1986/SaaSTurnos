<?php

namespace Database\Seeders\catalogos;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tipo_BloqueoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipos_bloqueos')->insert([
            ['codigo' => 'LICENCIA','tipo_bloqueo' => 'Licencia'],
            ['codigo' => 'ENFERMEDAD','tipo_bloqueo' => 'Enfermedad'],
            ['codigo' => 'FERIADO','tipo_bloqueo' => 'Feriado'],
            ['codigo' => 'MOTIVOS_PERSONALES','tipo_bloqueo' => 'Motivos Personales']
        ]);
    }
}
