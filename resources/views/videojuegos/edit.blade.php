@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Videojuego</h1>

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
                    <option value="{{ $etiqueta->id }}" {{ in_array($etiqueta->id, $videojuego->etiquetas->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $etiqueta->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>

    <form action="{{ route('videojuegos.destroy', $videojuego->id) }}" method="POST" style="margin-top: 20px;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este videojuego?')">Eliminar</button>
    </form>
</div>
@endsection
