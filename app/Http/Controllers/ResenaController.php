<?php

namespace App\Http\Controllers;

use App\Models\Resena;
use App\Models\Videojuego;
use Illuminate\Http\Request;

class ResenaController extends Controller
{
    /**
     * Muestra una lista de los recursos.
     */
    public function index()
    {
        $resenas = Resena::all();
          return view('resenas.index' ,compact('resenas'));
    }

    /**
     * Muestra el formulario para crear una nueva reseña.
     */
    public function create()
    {
        // Obtener todos los videojuegos de la base de datos
        $videojuegos = Videojuego::all();
    
        // Devolver la vista para crear una nueva reseña junto con la lista de videojuegos
        return view('resenas.create', compact('videojuegos'));
    }

    public function store(Request $request)
    {
        // Validar los datos enviados desde el formulario
        $request->validate([
            'usuario' => 'required',
            'contenido' => 'required',
            'puntuacion' => 'required|numeric|min:0|max:10',
            'videojuego_id' => 'required|exists:videojuegos,id', // Validar que el ID del videojuego exista en la tabla videojuegos
        ]);
    
        // Crear una nueva reseña con los datos del formulario
        $resena = new Resena([
            'usuario' => $request->usuario,
            'contenido' => $request->contenido,
            'puntuacion' => $request->puntuacion,
        ]);
    
        // Asociar la reseña al videojuego seleccionado
        $resena->videojuego()->associate($request->videojuego_id);
        $resena->save();
    
        // Redirigir a la página de índice de reseñas con un mensaje de éxito
        return redirect()->route('resenas.index')->with('success', 'Reseña creada exitosamente.');
    }

        /**
     * Muestra el formulario para editar una reseña específica.
     */
    public function edit(Resena $resena)
    {
        return view('resenas.edit', compact('resena'));
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     */
    public function update(Request $request, Resena $resena)
    {
        // Validar los datos enviados desde el formulario
        $request->validate([
            'usuario' => 'required',
            'contenido' => 'required',
            'puntuacion' => 'required|numeric|min:1|max:5',
        ]);

        // Actualizar la reseña con los datos del formulario
        $resena->update($request->all());

        // Redirigir a la página de índice de reseñas con un mensaje de éxito
        return redirect()->route('resenas.index')->with('success', 'Reseña actualizada exitosamente.');
    }

    /**
     * Elimina el recurso especificado del almacenamiento.
     */
    public function destroy(Resena $resena)
    {
        // Eliminar la reseña especificada
        $resena->delete();

        // Redirigir a la página de índice de reseñas con un mensaje de éxito
        return redirect()->route('resenas.index')->with('success', 'Reseña eliminada exitosamente.');
    }
    
}
