<?php

namespace App\Services;

use App\Models\Actor;
use Exception;
use Illuminate\Support\Facades\DB;

class ActorService
{

    public function createActor(array $data)
    {
         return  DB::transaction(function () use ($data) {
            // Validar datos de entrada
            if (empty($data['nombre'])) {
                throw new Exception('El nombre del actor es obligatorio');
            }

            // Crear nuevo actor
            $actor = Actor::create([
                'nombre' => $data['nombre'],
                'apellido' => $data['apellido'] ?? null,
                'email' => $data['email'] ?? null,
                'telefono' => $data['telefono'] ?? null,
            ]);

            //asignar sucursales al actor
            if (!empty($data['sucursales'])) {
                $actor->sucursales()->attach($data['sucursales']);
            }

            return $actor;
        });
    }

    public function updateActor(int $id, array $data)
    {
        return DB::transaction(function () use ($id, $data) {
            $actor = Actor::findOrFail($id);
            $actor->update($data);

            // Actualizar sucursales del actor
            if (isset($data['sucursales'])) {
                $actor->sucursales()->sync($data['sucursales']);
            }

            return $actor;
        });
    }

    public function deleteActor(int $id)
    {
        // Lógica para eliminar un Actor
    }
}
