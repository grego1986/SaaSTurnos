<?php

namespace App\Services;

use App\Models\Reserva;

class ReservaQueryService
{

    // Métodos de consulta
    public function obtenerPorId(int $id)
    {
        return Reserva::with([
            //
        ])->findOrFail($id);
    }

    // Método para listar todos los registros
    public function listar()
    {
        return Reserva::with([
            //
        ])->get();
    }

    // Método para buscar con filtros
    public function buscar(array $filtros)
    {
        $query = Reserva::query();

        // filtros

        return $query->get();
    }
}
