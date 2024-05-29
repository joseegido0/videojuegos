<?php

namespace App\Http\Controllers;

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
}

