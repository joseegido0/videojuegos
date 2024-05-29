<?php

namespace App\Http\Controllers;

use App\Models\Desarrollador;
use App\Models\Etiqueta;
use App\Models\Videojuego;
use Illuminate\Http\Request;

class VideojuegoController extends Controller
{
    /**
     * Muestra una lista de los recursos.
     */
    public function index()
    {
        $videojuegos = Videojuego::with('desarrollador', 'resenas', 'etiquetas')->get(); // Cargar las relaciones
        return view('videojuegos.index', compact('videojuegos'));
    }

    private function desarrolladorTieneVideojuegoAsociado($desarrolladorId, $excludeVideojuegoId = null)
    {
        $query = Videojuego::where('desarrollador_id', $desarrolladorId);
        if ($excludeVideojuegoId) {
            $query->where('id', '<>', $excludeVideojuegoId);
        }
        return $query->exists();
    }

    public function create()
    {
    $desarrolladores = Desarrollador::all();
    $etiquetas = Etiqueta::all();
    return view('videojuegos.create', compact('desarrolladores', 'etiquetas'));
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_lanzamiento' => 'required|date',
            'desarrollador_id' => 'required|exists:desarrolladores,id',
            'etiquetas' => 'array|exists:etiquetas,id',
        ]);

        // Verificar si el desarrollador ya tiene un videojuego asociado
        if ($this->desarrolladorTieneVideojuegoAsociado($validatedData['desarrollador_id'])) {
            return redirect()->back()->with('error', 'El desarrollador ya tiene un videojuego asociado.');
        }

        // Crear el videojuego
        $videojuego = Videojuego::create($validatedData);

        // Asociar las etiquetas si se proporcionan
        if ($request->has('etiquetas')) {
            $videojuego->etiquetas()->attach($request->etiquetas);
        }

        return redirect()->route('videojuegos.index')->with('success', 'Videojuego creado exitosamente.');
    }

    public function edit(Videojuego $videojuego)
    {
        $desarrolladores = Desarrollador::all();
        $etiquetas = Etiqueta::all();
        return view('videojuegos.edit', compact('videojuego', 'desarrolladores', 'etiquetas'));
    }

    public function update(Request $request, Videojuego $videojuego)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_lanzamiento' => 'required|date',
            'desarrollador_id' => 'required|exists:desarrolladores,id',
            'etiquetas' => 'array|exists:etiquetas,id',
        ]);

        // Verificar si el desarrollador ya tiene un videojuego asociado
        if ($this->desarrolladorTieneVideojuegoAsociado($validatedData['desarrollador_id'], $videojuego->id)) {
            return redirect()->back()->with('error', 'El desarrollador ya tiene un videojuego asociado.');
        }

        // Actualizar el videojuego
        $videojuego->update($validatedData);

        // Sincronizar las etiquetas si se proporcionan
        if ($request->has('etiquetas')) {
            $videojuego->etiquetas()->sync($request->etiquetas);
        }

        return redirect()->route('videojuegos.index')->with('success', 'Videojuego actualizado exitosamente.');
    }

    public function destroy(Videojuego $videojuego)
    {
        $videojuego->delete();
        return redirect()->route('videojuegos.index')->with('success', 'Videojuego eliminado exitosamente.');
    }


}

