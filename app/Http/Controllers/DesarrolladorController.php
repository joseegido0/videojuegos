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

        /**
     * Muestra el formulario para editar el recurso especificado.
     */
    public function edit(Desarrollador $desarrollador)
    {
        // Devolver la vista para editar el desarrollador especificado
        return view('desarrolladores.edit', compact('desarrollador'));
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     */
    public function update(Request $request, Desarrollador $desarrollador)
    {
        // Obtener todos los desarrolladores de la base de datos
        $desarrolladores = Desarrollador::all();
        
        // Validar los datos enviados desde el formulario
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
        ]);

        // Actualizar el desarrollador con los datos del formulario
        $desarrollador->update($request->all());

        // Redirigir a la página de índice de desarrolladores con un mensaje de éxito
        return redirect()->route('desarrolladores.index')->with('success', 'Desarrollador actualizado exitosamente.');
    }

    /**
     * Elimina el recurso especificado del almacenamiento.
     */
    public function destroy(Desarrollador $desarrollador)
    {
        // Eliminar el desarrollador especificado
        $desarrollador->delete();

        // Redirigir a la página de índice de desarrolladores con un mensaje de éxito
        return redirect()->route('desarrolladores.index')->with('success', 'Desarrollador eliminado exitosamente.');
    }

}