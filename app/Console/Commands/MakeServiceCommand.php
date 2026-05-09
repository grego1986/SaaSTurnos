<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeServiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'crear una clase service en app/Services';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $path = app_path("Services/{$name}Service.php");
        if (!file::exists(app_path('Services'))) {
            File::makeDirectory(app_path('Services'));
        }
        if (file::exists($path)) {
            $this->error("La clase {$name}Service ya existe.");
            return;
        }

        // Crear el contenido de la clase
        $stub = <<<PHP
<?php

namespace App\Services;

use App\Models\\{$name};
use Exception;
use Illuminate\Support\Facades\DB;

class {$name}Service
{

     public function create{$name}(array \$data)
    {
    // Lógica para crear un nuevo {$name}
    }

    public function update{$name}(int \$id, array \$data)
    {
        // Lógica para actualizar un {$name} existente
    }

    public function delete{$name}(int \$id)
    {
        // Lógica para eliminar un {$name}
    }
}
PHP;
        File::put($path, $stub);
        $this->info("Clase {$name}Service creada exitosamente.");
    }
}
