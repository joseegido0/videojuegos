@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Desarrolladores</h1>
    <a href="{{ route('desarrolladores.create') }}" class="btn btn-primary mb-3">Crear Desarrollador</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($desarrolladores as $desarrollador)
            <tr>
                <td>{{ $desarrollador->nombre }}</td>
                <td>{{ $desarrollador->apellido }}</td>
                <td>
                    <a href="{{ route('desarrolladores.edit', $desarrollador->id) }}" class="btn btn-warning btn-sm">Editar</a> <!-- Botón para editar -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection



