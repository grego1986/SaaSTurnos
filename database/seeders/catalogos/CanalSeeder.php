<?php

namespace Database\Seeders\catalogos;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CanalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('canales')->insert([
            ['codigo' => 'EMAIL','canal' => 'Email'],
            ['codigo' => 'WHATSAPP','canal' => 'Whatsapp'],
            ['codigo' => 'APLICACION','canal' => 'AplicaciÓn']
        ]);
    }
}
