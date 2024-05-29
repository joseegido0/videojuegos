@extends('layouts.app')

@section('title', 'Editar Desarrollador')

@section('content')
<div class="container">
    <div class="mb-3 py-3">
        <a href="{{ route('desarrolladores.index') }}" class="btn btn-secondary">Volver</a>
    </div>
    <h1 class="my-4">Editar Desarrollador</h1>

    <form action="{{ route('desarrolladores.update', $desarrollador->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $desarrollador->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" value="{{ $desarrollador->apellido }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>

    <!-- Formulario para eliminar el desarrollador -->
    <form action="{{ route('desarrolladores.destroy', $desarrollador->id) }}" method="POST" class="mt-3">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este desarrollador?')">Eliminar Desarrollador</button>
    </form>
</div>
@endsection