@extends('layouts.app')

@section('title', 'Editar Reseña')

@section('content')
<div class="container">
    <div class="mb-3 py-3">
        <a href="{{ route('resenas.index') }}" class="btn btn-secondary">Volver</a>
    </div>
    <h1 class="my-4">Editar Reseña</h1>
    <form action="{{ route('resenas.update', $resena->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="usuario">Usuario</label>
            <input type="text" class="form-control" id="usuario" name="usuario" value="{{ $resena->usuario }}" required>
        </div>
        <div class="form-group">
            <label for="contenido">Contenido</label>
            <textarea class="form-control" id="contenido" name="contenido" required>{{ $resena->contenido }}</textarea>
        </div>
        <div class="form-group">
            <label for="puntuacion">Puntuación</label>
            <input type="number" class="form-control" id="puntuacion" name="puntuacion" value="{{ $resena->puntuacion }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

    <form action="{{ route('resenas.destroy', $resena->id) }}" method="POST" class="mt-3">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar esta reseña?')">Eliminar Reseña</button>
    </form>
</div>
@endsection