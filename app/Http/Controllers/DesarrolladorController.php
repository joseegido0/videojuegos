<?php

namespace App\Http\Controllers;

use App\Models\Desarrollador;
use App\Models\Videojuego;
use Illuminate\Http\Request;

class DesarrolladorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $desarrolladores = Desarrollador::all();
          return view('desarrolladores.index' ,compact('desarrolladores'));
    }
}
