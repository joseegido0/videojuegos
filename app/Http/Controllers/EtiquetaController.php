<?php

namespace App\Http\Controllers;

use App\Models\Etiqueta;
use Illuminate\Http\Request;

class EtiquetaController extends Controller
{
    /**
     * Muestra una lista de los recursos.
     */
    public function index()
    {
        $etiquetas = Etiqueta::all();
          return view('etiquetas.index' ,compact('etiquetas'));
    }

        /**
     * Muestra el formulario para crear una nueva etiqueta.
     */
    public function create()
    {
        return view('etiquetas.create');
    }

    /**
     * Almacena un recurso recién creado en el almacenamiento.
     */
    public function store(Request $request)
    {
        // Validar los datos enviados desde el formulario
        $request->validate([
            'nombre' => 'required',
        ]);

        // Crear una nueva etiqueta con los datos del formulario
        Etiqueta::create($request->all());

        // Redirigir a la página de índice de etiquetas con un mensaje de éxito
        return redirect()->route('etiquetas.index')->with('success', 'Etiqueta creada exitosamente.');
    }

        /**
     * Muestra el formulario para editar una etiqueta específica.
     */
    public function edit(Etiqueta $etiqueta)
    {
        return view('etiquetas.edit', compact('etiqueta'));
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     */
    public function update(Request $request, Etiqueta $etiqueta)
    {
        // Validar los datos enviados desde el formulario
        $request->validate([
            'nombre' => 'required',
        ]);

        // Actualizar la etiqueta con los datos del formulario
        $etiqueta->update($request->all());

        // Redirigir a la página de índice de etiquetas con un mensaje de éxito
        return redirect()->route('etiquetas.index')->with('success', 'Etiqueta actualizada exitosamente.');
    }

        /**
     * Elimina el recurso especificado del almacenamiento.
     */
    public function destroy(Etiqueta $etiqueta)
    {
        // Eliminar la etiqueta especificada
        $etiqueta->delete();

        // Redirigir a la página de índice de etiquetas con un mensaje de éxito
        return redirect()->route('etiquetas.index')->with('success', 'Etiqueta eliminada exitosamente.');
    }

}
