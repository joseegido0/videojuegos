<?php

namespace App\Http\Controllers;

use App\Models\Desarrollador;
use Illuminate\Http\Request;

class DesarrolladorController extends Controller
{
    /**
     * Muestra una lista de los recursos.
     */
    public function index()
    {
        // Obtener todos los desarrolladores de la base de datos
        $desarrolladores = Desarrollador::all();
        // Devolver la vista 'desarrolladores.index' con los datos de los desarrolladores
        return view('desarrolladores.index', compact('desarrolladores'));
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     */
    public function create()
    {
        // Devolver la vista para crear un nuevo desarrollador
        return view('desarrolladores.create');
    }

    /**
     * Almacena un recurso recién creado en el almacenamiento.
     */
    public function store(Request $request)
    {
        // Validar los datos enviados desde el formulario
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
        ]);

        // Crear un nuevo desarrollador con los datos del formulario
        Desarrollador::create($request->all());

        // Redirigir a la página de índice de desarrolladores con un mensaje de éxito
        return redirect()->route('desarrolladores.index')->with('success', 'Desarrollador creado exitosamente.');
    }

}