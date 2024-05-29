@extends('layouts.app')

@section('title', 'Editar Etiqueta')

@section('content')
<div class="container">
    <div class="mb-3 py-3">
        <a href="{{ route('etiquetas.index') }}" class="btn btn-secondary">Volver</a>
    </div>
    <h1 class="my-4">Editar Etiqueta</h1>
    <form action="{{ route('etiquetas.update', $etiqueta->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $etiqueta->nombre }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

    <form action="{{ route('etiquetas.destroy', $etiqueta->id) }}" method="POST" class="mt-3">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar esta etiqueta?')">Eliminar Etiqueta</button>
    </form>
</div>
@endsection
