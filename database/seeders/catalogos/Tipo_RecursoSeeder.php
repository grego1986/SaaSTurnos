<?php

namespace Database\Seeders\catalogos;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tipo_RecursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('tipos_recursos')->insert([
            //deportes
            ['codigo' => 'CANCHA_F11','tipo' => 'cancha F11'],
            ['codigo' => 'CANCHA_F8','tipo' => 'cancha F8'],
            ['codigo' => 'CANCHA_F7','tipo' => 'cancha F7'],
            ['codigo' => 'CANCHA_F6','tipo' => 'cancha F6'],
            ['codigo' => 'CANCHA_F5','tipo' => 'cancha F5'],
            ['codigo' => 'CANCHA_PADEL','tipo' => 'Cancha Padel'],
            ['codigo' => 'CANCHA_TENIS','tipo' => 'Cancha tenis'],
            ['codigo' => 'CANCHA_BASQUET','tipo' => 'Cancha básquet'],
            ['codigo' => 'CANCHA_VOLEY','tipo' => 'Cancha vóley'],

            //estetica / belleza
            ['codigo' => 'PELUQUERO','tipo' => 'Peluquero'],
            ['codigo' => 'BARBERO','tipo' => 'Barbero'],
            ['codigo' => 'COLORISTA','tipo' => 'Colorista'],
            ['codigo' => 'COSMETOLOGA','tipo' => 'Cosmetóloga'],
            ['codigo' => 'MANICURA','tipo' => 'Manicura'],
            ['codigo' => 'PEDICURA','tipo' => 'Pedicura'],
            ['codigo' => 'MASAJISTA','tipo' => 'Masajista']

        ]);
    }
}
