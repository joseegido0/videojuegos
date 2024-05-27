<?php

use App\Http\Controllers\DesarrolladorController;
use App\Http\Controllers\EtiquetaController;
use App\Http\Controllers\ResenaController;
use App\Http\Controllers\VideojuegoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('videojuegos', VideojuegoController::class);
Route::resource('desarrolladores', DesarrolladorController::class);
Route::resource('resenas', ResenaController::class);
Route::resource('etiquetas', EtiquetaController::class);

