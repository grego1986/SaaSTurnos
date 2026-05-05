<?php

namespace Database\Seeders\catalogos;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('acciones')->insert([
            ['codigo' => 'CREAR_RESERVA', 'descripcion' => 'Crea una reserva'],
            ['codigo' => 'MODIFICAR_RESERVA', 'descripcion' => 'Modifica una reserva'],
            ['codigo' => 'CANCELAR_RESERVA', 'descripcion' => 'Cancela una reserva']
        ]);
    }
}
