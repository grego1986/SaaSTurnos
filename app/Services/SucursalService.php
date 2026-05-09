<?php

namespace App\Services;

use App\Models\Sucursal;
use Exception;
use Illuminate\Support\Facades\DB;

class SucursalService
{

     public function createSucursal(array $data)
    {
        try {
            return DB::transaction(function () use ($data) {
                // Validar datos de entrada
                if (empty($data['nombre'])) {
                    throw new Exception('El nombre de la sucursal es obligatorio');
                }

                // Crear nueva sucursal
                $sucursal = Sucursal::create([
                    'institucion_id' => $data['institucion_id'],
                    'nombre' => $data['nombre'],
                    'direccion' => $data['direccion'] ?? null,
                    'latitud' => $data['latitud'] ?? null,
                    'longitud' => $data['longitud'] ?? null,
                    'telefono' => $data['telefono'] ?? null,
                    'email' => $data['email'] ?? null,
                ]);

                return $sucursal;
            });
        } catch (Exception $e) {
            // Manejar excepciones y errores
            throw new Exception('Error al crear la sucursal: ' . $e->getMessage());
        }
    }

    public function updateSucursal(int $id, array $data)
    {
        // Lógica para actualizar un Sucursal existente
        try {
            $sucursal = Sucursal::findOrFail($id);

            // Validar datos de entrada
            if (isset($data['nombre']) && empty($data['nombre'])) {
                throw new Exception('El nombre de la sucursal no puede estar vacío');
            }

            // Actualizar sucursal
            $sucursal->update([
                'institucion_id' => $data['institucion_id'] ?? $sucursal->institucion_id,
                'nombre' => $data['nombre'] ?? $sucursal->nombre,
                'direccion' => $data['direccion'] ?? $sucursal->direccion,
                'latitud' => $data['latitud'] ?? $sucursal->latitud,
                'longitud' => $data['longitud'] ?? $sucursal->longitud,
                'telefono' => $data['telefono'] ?? $sucursal->telefono,
                'email' => $data['email'] ?? $sucursal->email,
            ]);

            return $sucursal;
        } catch (Exception $e) {
            // Manejar excepciones y errores
            throw new Exception('Error al actualizar la sucursal: ' . $e->getMessage());
        }
    }

    public function deleteSucursal(int $id)
    {
        // Lógica para eliminar un Sucursal
        try {
            $sucursal = Sucursal::findOrFail($id);
            $sucursal->delete();
        } catch (Exception $e) {
            throw new Exception('Error al eliminar la sucursal: ' . $e->getMessage());
        }
    }
}
