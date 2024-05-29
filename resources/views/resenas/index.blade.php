@extends('layouts.app')

@section('title', 'Lista de Reseñas')

@section('content')
<div class="container">
    <h1 class="my-4">Lista de Reseñas</h1>
    <a href="{{ route('resenas.create') }}" class="btn btn-primary mb-3">Crear Nueva Reseña</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Contenido</th>
                <th>Puntuación</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($resenas as $resena)
            <tr>
                <td>{{ $resena->usuario }}</td>
                <td>{{ $resena->contenido }}</td>
                <td>{{ $resena->puntuacion }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

