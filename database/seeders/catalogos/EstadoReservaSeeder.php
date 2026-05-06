<?php

namespace Database\Seeders\catalogos;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoReservaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estados_reservas')->insert([
            ['codigo' => 'LIBRE','estado' => 'Libre'],
            ['codigo' => 'PENDIENTE','estado' => 'Pendiente'],
            ['codigo' => 'CONFIRMADA','estado' => 'Confirmada'],
            ['codigo' => 'CANCELADA','estado' => 'Cancelada'],
            ['codigo' => 'NO-SHOW','estado' => 'No_Show'],
            ['codigo' => 'COMPLETADA','estado' => 'Completada'],
            ['codigo' => 'REPROGRAMADA','estado' => 'Reprogramada']
        ]);
    }
}
