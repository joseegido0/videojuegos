@extends('layouts.app')

@section('title', 'Crear Videojuego')

@section('content')
<div class="container">
    <div class="mb-3 py-3">
        <a href="{{ route('videojuegos.index') }}" class="btn btn-secondary">Volver</a>
    </div>
    <h1 class="my-4">Crear Videojuego</h1>

    <!-- Mostrar alert si hay errores de validación -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Mostrar alert si el desarrollador ya tiene un videojuego asociado -->
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

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
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection

