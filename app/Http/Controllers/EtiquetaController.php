<?php

namespace App\Http\Controllers;

use App\Models\Etiqueta;
use Illuminate\Http\Request;

class EtiquetaController extends Controller
{
    /**
     * Muestra lista del contenido.
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

}
