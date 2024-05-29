@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-3 py-3">
        <a href="{{ route('desarrolladores.index') }}" class="btn btn-secondary">Volver</a>
    </div>
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Crear Desarrollador</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('desarrolladores.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>
@endsection
