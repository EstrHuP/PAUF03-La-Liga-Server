<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    // GET - Listar
    public function index() {
        return Club::all();
    }

    // GET - Mostrar
    public function show(Club $club) {
        return $club -> load('jugadores');
    }

    // POST - Crear
    public function store(Request $request) {
        $request -> validate([
            'nombre' => 'required', 'string', 'max:100',
            'ciudad' => 'required', 'string', 'max:100',
            'categoria' => 'required', 'string', 'max:100'
        ]);
        return Club::create($request->all()); 
    }

    // PUT or PATCH - Actualizar
    public function update(Request $request, Club $club) {
        $club->update($request->all());
        return $club;
    }

    // DELETE - Eliminar
    public function destroy(Club $club) {
        $club->delete();
        return response()->noContent();
    }
}