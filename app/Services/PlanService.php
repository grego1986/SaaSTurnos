<?php

namespace App\Services;

use App\Models\Plan;
use Exception;
use Illuminate\Support\Facades\DB;

class PlanService
{

     public function createPlan(array $data)
    {
       return Plan::create([
            'nombre' => $data['nombre'],
            'precio' => $data['precio'] ?? 0,
            'limite_profesional' => $data['limite_profesional'] ?? null,
            'limite_sucursales' => $data['limite_sucursales'] ?? null,
            'recordatorio' => $data['recordatorio'] ?? false,
            'activo' => $data['activo'] ?? true,
        ]);
    }

    public function updatePlan(int $id, array $data)
    {
        $plan = Plan::findOrFail($id);

        return $plan->update([
            'nombre' => $data['nombre'] ?? null,
            'precio' => $data['precio'] ?? null,
            'limite_profesional' => $data['limite_profesional'] ?? null,
            'limite_sucursales' => $data['limite_sucursales'] ?? null,
            'recordatorio' => $data['recordatorio'] ?? null,
            'activo' => $data['activo'] ?? null,
        ]);
    }

    public function deletePlan(int $id)
    {
        // Lógica para eliminar un Plan
    }
}
