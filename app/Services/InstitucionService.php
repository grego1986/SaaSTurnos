<?php

namespace App\Services;

use App\Models\Institucion;
use App\Queries\InstitucionQuery;
use Exception;
use Illuminate\Support\Facades\DB;

class InstitucionService
{
    public function __construct(
        private InstitucionQuery $institucionQuery
    ) {}

    public function createInstitucion(array $data)
    {
        try {
            return DB::transaction(function () use ($data) {
                // Validar datos de entrada
                if (empty($data['nombre'])) {
                    throw new Exception('El nombre de la institución es obligatorio');
                }

                if (empty($data['slug'])) {
                    throw new Exception('El slug de la institución es obligatorio');
                }

                if (empty($data['descripcion'])) {
                    throw new Exception('La descripción de la institución es obligatoria');
                }

                if (!empty($this->institucionQuery->obtenerPorSlug($data['slug'] ?? ''))) {
                    throw new Exception('El slug de la institución ya existe');
                }

                // Crear nueva institución
                $institucion = Institucion::create([
                    'nombre' => $data['nombre'],
                    'direccion' => $data['direccion'] ?? null,
                    'slug' => $data['slug'],
                    'telefono' => $data['telefono'] ?? null,
                    'email' => $data['email'] ?? null,
                ]);

                return $institucion;
            });
        } catch (Exception $e) {
            // Manejar excepciones y errores
            throw new Exception('Error al crear la institución: ' . $e->getMessage());
        }
    }

    public function updateInstitucion(int $id, array $data)
    {
        // Lógica para actualizar un Institucion existente
        try {
            $institucion = Institucion::findOrFail($id);

            // Validar datos de entrada
            if (isset($data['nombre']) && empty($data['nombre'])) {
                throw new Exception('El nombre de la institución no puede estar vacío');
            }

            if (isset($data['slug']) && empty($data['slug'])) {
                throw new Exception('El slug de la institución no puede estar vacío');
            }

            // Actualizar institución
            $institucion->update([
                'nombre' => $data['nombre'] ?? $institucion->nombre,
                'slug' => $data['slug'] ?? $institucion->slug,
                'descripcion' => $data['descripcion'] ?? $institucion->descripcion,
                'suscripcion_activa' => $data['suscripcion_activa'] ?? $institucion->suscripcion_activa,
                'fecha_vencimiento' => $data['fecha_vencimiento'] ?? $institucion->fecha_vencimiento,
                'direccion' => $data['direccion'] ?? $institucion->direccion,
                'telefono' => $data['telefono'] ?? $institucion->telefono,
                'email' => $data['email'] ?? $institucion->email,
            ]);

            return $institucion;
        } catch (Exception $e) {
            // Manejar excepciones y errores
            throw new Exception('Error al actualizar la institución: ' . $e->getMessage());
        }
    }

    public function deleteInstitucion(int $id)
    {
        // Lógica para eliminar un Institucion
        try {
            $institucion = Institucion::findOrFail($id);
            $institucion->delete();
        } catch (Exception $e) {
            throw new Exception('Error al eliminar la institución: ' . $e->getMessage());
        }
    }
}
