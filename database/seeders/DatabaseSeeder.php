<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\catalogos\AccionSeeder;
use Database\Seeders\catalogos\CanalSeeder;
use Database\Seeders\catalogos\EstadoReservaSeeder;
use Database\Seeders\catalogos\MensajeNotificacionSeeder;
use Database\Seeders\catalogos\RolSeeder;
use Database\Seeders\catalogos\TipoNotificacionSeeder;
use Database\Seeders\catalogos\Tipo_BloqueoSeeder;
use Database\Seeders\catalogos\Tipo_RecursoSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       // User::factory()->create();

        $this->call([
            //EstadoReservaSeeder::class,
            //MensajeNotificacionSeeder::class,
            //RolSeeder::class,
            //Tipo_BloqueoSeeder::class,
            //Tipo_RecursoSeeder::class,
            //TipoNotificacionSeeder::class,
            //AccionSeeder::class,
            //CanalSeeder::class,
        ]);
    }
}
