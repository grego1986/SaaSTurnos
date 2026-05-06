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
    ['codigo' => 'SUPER_USER','rol' => 'Super_User'],
    ['codigo' => 'ADMIN','rol' => 'Admin'],
    ['codigo' => 'OPERADOR','rol' => 'Operador'],
    ['codigo' => 'RECURSO','rol' => 'Recurso'],
    ['codigo' => 'CLIENTE','rol' => 'Cliente']
]);
    }
}
