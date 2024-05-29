@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-3 py-3">
        <a href="{{ route('resenas.index') }}" class="btn btn-secondary">Volver</a>
    </div>
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Crear Reseña</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('resenas.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="videojuego_id">Videojuego:</label>
                    <select name="videojuego_id" id="videojuego_id" class="form-control" required>
                        @foreach($videojuegos as $videojuego)
                            <option value="{{ $videojuego->id }}">{{ $videojuego->titulo }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="usuario">Usuario:</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" required>
                </div>
                <div class="form-group">
                    <label for="contenido">Contenido:</label>
                    <textarea class="form-control" id="contenido" name="contenido" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="puntuacion">Puntuación:</label>
                    <input type="number" class="form-control" id="puntuacion" name="puntuacion" min="0" max="10" required>
                </div>
                <button type="submit" class="btn btn-primary">Crear Reseña</button>
            </form>
        </div>
    </div>
</div>
@endsection

