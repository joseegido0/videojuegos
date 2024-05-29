@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nuevo Videojuego</h1>

    <form action="{{ route('videojuegos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
        </div>
        <div class="form-group">
            <label for="fecha_lanzamiento">Fecha de Lanzamiento</label>
            <input type="date" class="form-control" id="fecha_lanzamiento" name="fecha_lanzamiento" required>
        </div>
        <div class="form-group">
            <label for="desarrollador_id">Desarrollador</label>
            <select class="form-control" id="desarrollador_id" name="desarrollador_id" required>
                @foreach($desarrolladores as $desarrollador)
                    <option value="{{ $desarrollador->id }}">{{ $desarrollador->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="etiquetas">Etiquetas</label>
            <select class="form-control" id="etiquetas" name="etiquetas[]" multiple>
                @foreach($etiquetas as $etiqueta)
                    <option value="{{ $etiqueta->id }}">{{ $etiqueta->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
</div>
@endsection
