<?php

namespace App\Queries;

use App\Models\Institucion;

class InstitucionQuery
{

    // Métodos de consulta
    public function obtenerPorId(int $id)
    {
        return Institucion::with([
            //
        ])->findOrFail($id);
    }

    // Método para listar todos los registros
    public function listar()
    {
        return Institucion::with([
            //
        ])->get();
    }

    // Método para buscar con filtros
    public function buscar(array $filtros)
    {
        $query = Institucion::query();

        // filtros

        return $query->get();
    }

    public function obtenerPorSlug(string $slug)
    {
        return Institucion::where('slug', $slug)->first()->orNull();
    }
}
