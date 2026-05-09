<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeQueryServiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:query {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'crear una clase query service en app/Queries';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $path = app_path("Queries/{$name}Query.php");
        if (!File::exists(app_path('Queries'))) {
            File::makeDirectory(app_path('Queries'), 0755, true);
        }
        if (File::exists($path)) {
            $this->error("La clase {$name}Query ya existe.");
            return;
        }

        // Crear el contenido de la clase
        $stub = <<<PHP
<?php

namespace App\Queries;

use App\Models\\{$name};

class {$name}Query
{

    // Métodos de consulta
    public function obtenerPorId(int \$id)
    {
        return {$name}::with([
            //
        ])->findOrFail(\$id);
    }

    // Método para listar todos los registros
    public function listar()
    {
        return {$name}::with([
            //
        ])->get();
    }

    // Método para buscar con filtros
    public function buscar(array \$filtros)
    {
        \$query = {$name}::query();

        // filtros

        return \$query->get();
    }
}

PHP;
        File::put($path, $stub);
        $this->info("Clase {$name}Query creada exitosamente.");
    }
}
