<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\catalogos\AccionSeeder;
use Database\Seeders\catalogos\MensajeNotificacionSeeder;
use Database\Seeders\catalogos\RolSeeder;
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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([AccionSeeder::class]);
        $this->call([CanalSeeder::class]);
        $this->call([EstadoReservaSeeder::class]);
        $this->call([MensajeNotificacionSeeder::class]);
        $this->call([RolSeeder::class]);
        $this->call([Tipo_BloqueoSeeder::class]);
        $this->call([Tipo_RecursoSeeder::class]);
        $this->call([TipoNotificacionSeeder::class]);
    }
}
