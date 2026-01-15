<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Liga;

class LigaController extends Controller
{
    // GET - Listar
    public function index() {
        return Liga::all();
    }

    // GET - Mostrar
    public function show(Liga $liga) {
        return $liga -> load('partidos');
    }

    // POST - Crear
    public function store(Request $request) {
        $request -> validate([
            'nombre' => 'required',
            'deporte' => 'required',
            'temporada' => 'required'
        ]);
        return Liga::create($request->all()); 
    }

    // PUT or PATCH - Actualizar
    public function update(Request $request, Liga $liga) {
        $liga->update($request->all());
        return $liga;
    }

    // DELETE - Eliminar
    public function destroy(Liga $liga) {
        $liga->delete();
        return response()->noContent();
    }
}