<?php

namespace Database\Seeders\catalogos;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    DB::table('roles')->insert([
    ['codigo' => 'SUPER_USER','nombre' => 'Super_User'],
    ['codigo' => 'ADMIN','nombre' => 'Admin'],
    ['codigo' => 'OPERADOR','nombre' => 'Operador'],
    ['codigo' => 'RECURSO','nombre' => 'Recurso'],
    ['codigo' => 'CLIENTE','nombre' => 'Cliente']
]);
    }
}
