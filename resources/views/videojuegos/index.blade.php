@extends('layouts.app')

@section('title', 'Lista de Videojuegos')

@section('content')
<div class="container">
    <h1 class="my-4">Lista de Videojuegos</h1>
    <a href="{{ route('videojuegos.create') }}" class="btn btn-primary mb-3">Crear Nuevo Videojuego</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Fecha de Lanzamiento</th>
                <th>Desarrollador</th>
                <th>Reseñas</th>
                <th>Etiquetas</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($videojuegos as $videojuego)
            <tr>
                <td>{{ $videojuego->titulo }}</td>
                <td>{{ $videojuego->descripcion }}</td>
                <td>{{ $videojuego->fecha_lanzamiento }}</td>
                <td>{{ $videojuego->desarrollador->nombre }}</td>
                <td>
                    <ul>
                        @foreach ($videojuego->resenas as $resena)
                            <li>{{ $resena->contenido }} - {{ $resena->usuario }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul>
                        @foreach ($videojuego->etiquetas as $etiqueta)
                            <li>{{ $etiqueta->nombre }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <a href="{{ route('videojuegos.edit', $videojuego->id) }}" class="btn btn-warning btn-sm">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection



