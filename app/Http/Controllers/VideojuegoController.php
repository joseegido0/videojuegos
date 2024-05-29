<?php

namespace App\Http\Controllers;

use App\Models\Desarrollador;
use App\Models\Etiqueta;
use App\Models\Videojuego;
use Illuminate\Http\Request;

class VideojuegoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videojuegos = Videojuego::with('desarrollador', 'resenas', 'etiquetas')->get(); // Cargar las relaciones
        return view('videojuegos.index', compact('videojuegos'));
    }

    public function create()
    {
    $desarrolladores = Desarrollador::all();
    $etiquetas = Etiqueta::all();
    return view('videojuegos.create', compact('desarrolladores', 'etiquetas'));
    }

    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'titulo' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'fecha_lanzamiento' => 'required|date',
        'desarrollador_id' => 'required|exists:desarrolladores,id',
        'etiquetas' => 'array|exists:etiquetas,id',
    ]);

    $videojuego = Videojuego::create($validatedData);
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
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_lanzamiento' => 'required|date',
            'desarrollador_id' => 'required|exists:desarrolladores,id',
            'etiquetas' => 'array|exists:etiquetas,id',
        ]);

        $videojuego->update($validatedData);
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

