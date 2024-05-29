@extends('layouts.app')

@section('title', 'Editar Videojuego')

@section('content')
<div class="container">
    <h1 class="my-4">Editar Videojuego</h1>

    <form action="{{ route('videojuegos.update', $videojuego->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $videojuego->titulo }}" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" required>{{ $videojuego->descripcion }}</textarea>
        </div>
        <div class="form-group">
            <label for="fecha_lanzamiento">Fecha de Lanzamiento</label>
            <input type="date" class="form-control" id="fecha_lanzamiento" name="fecha_lanzamiento" value="{{ $videojuego->fecha_lanzamiento }}" required>
        </div>
        <div class="form-group">
            <label for="desarrollador_id">Desarrollador</label>
            <select class="form-control" id="desarrollador_id" name="desarrollador_id" required>
                @foreach($desarrolladores as $desarrollador)
                    <option value="{{ $desarrollador->id }}" {{ $videojuego->desarrollador_id == $desarrollador->id ? 'selected' : '' }}>{{ $desarrollador->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="etiquetas">Etiquetas</label>
            <select class="form-control" id="etiquetas" name="etiquetas[]" multiple>
                @foreach($etiquetas as $etiqueta)
                    <option value="{{ $etiqueta->id }}" {{ $videojuego->etiquetas->contains($etiqueta->id) ? 'selected' : '' }}>{{ $etiqueta->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

    <form action="{{ route('videojuegos.destroy', $videojuego->id) }}" method="POST" class="mt-3">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Eliminar Videojuego</button>
    </form>
</div>
@endsection


