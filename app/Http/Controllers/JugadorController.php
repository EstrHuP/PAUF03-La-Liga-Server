<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jugador;

class JugadorController extends Controller
{
    // GET - Listar
    public function index() {
        return Jugador::all();
    }

    // GET - Mostrar
    public function show(Jugador $jugador) {
        return $jugador -> load('club');
    }

    // POST - Crear
    public function store(Request $request) {
        $request -> validate([
            'nombre' => 'required',
            'posicion' => 'required',
            'dorsal' => 'required',
            'club_id' => 'required',
        ]);
        return Jugador::create($request->all()); 
    }

    // PUT or PATCH - Actualizar
    public function update(Request $request, Jugador $jugador) {
        $jugador->update($request->all());
        return $jugador;
    }

    // DELETE - Eliminar
    public function destroy(Jugador $jugador) {
        $jugador->delete();
        return response()->noContent();
    }
}