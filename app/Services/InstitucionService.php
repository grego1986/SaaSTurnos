<?php

namespace App\Services;

use App\Models\Institucion;
use App\Queries\InstitucionQuery;
use App\Services\SucursalService;
use Exception;
use Illuminate\Support\Facades\DB;

class InstitucionService
{
    public function __construct(
        private InstitucionQuery $institucionQuery,
        private SucursalService $sucursalService,
    ) {}

    public function createInstitucion(array $data)
    {
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
                    'plan_id' => $data['plan_id'] ?? null,
                    'nombre' => $data['nombre'],
                    'slug' => $data['slug'],
                    'descripcion' => $data['descripcion'],
                    'suscripcion_activa' => $data['suscripcion_activa'] ?? false,
                    'fecha_vencimiento' => $data['fecha_vencimiento'] ?? null,
                    'estado' => $data['estado'] ?? 'activo',
                ]);

                $this->sucursalService->createSucursal([
                    'institucion_id' => $institucion->id,
                    'nombre' => $data['nombre'] . ' - Sucursal Principal',
                    'direccion' => $data['direccion'] ?? null,
                    'latitud' => $data['latitud'] ?? null,
                    'longitud' => $data['longitud'] ?? null,
                    'telefono' => $data['telefono'] ?? null,
                    'email' => $data['email'] ?? null,
                ]);

               return $institucion;
            });
    }

    public function updateInstitucion(int $id, array $data)
    {
        // Lógica para actualizar un Institucion existente
        return DB::transaction(function () use ($id, $data) {
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
                'plan_id' => $data['plan_id'] ?? $institucion->plan_id,
                'nombre' => $data['nombre'] ?? $institucion->nombre,
                'slug' => $data['slug'] ?? $institucion->slug,
                'descripcion' => $data['descripcion'] ?? $institucion->descripcion,
                'suscripcion_activa' => $data['suscripcion_activa'] ?? $institucion->suscripcion_activa,
                'fecha_vencimiento' => $data['fecha_vencimiento'] ?? $institucion->fecha_vencimiento,
                'estado' => $data['estado'] ?? $institucion->estado,
            ]);

            return $institucion;
        });
    }

    public function deleteInstitucion(int $id)
    {
        // Lógica para eliminar un Institucion

    }
}
