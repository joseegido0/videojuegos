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
// Route::resource('desarrolladores', DesarrolladorController::class);
Route::resource('resenas', ResenaController::class);
Route::resource('etiquetas', EtiquetaController::class);
// Muestra una lista de los recursos.
Route::get('desarrolladores', [DesarrolladorController::class, 'index'])->name('desarrolladores.index');

// Muestra el formulario para crear un nuevo recurso.
Route::get('desarrolladores/create', [DesarrolladorController::class, 'create'])->name('desarrolladores.create');

// Almacena un recurso recién creado en el almacenamiento.
Route::post('desarrolladores', [DesarrolladorController::class, 'store'])->name('desarrolladores.store');

// Muestra el formulario para editar el recurso especificado.
Route::get('desarrolladores/{desarrollador}/edit', [DesarrolladorController::class, 'edit'])->name('desarrolladores.edit');

// Actualiza el recurso especificado en el almacenamiento.
Route::put('desarrolladores/{desarrollador}', [DesarrolladorController::class, 'update'])->name('desarrolladores.update');

// Elimina el recurso especificado del almacenamiento.
Route::delete('desarrolladores/{desarrollador}', [DesarrolladorController::class, 'destroy'])->name('desarrolladores.destroy');
