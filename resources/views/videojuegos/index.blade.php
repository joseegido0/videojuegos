@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Videojuegos</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Fecha de Lanzamiento</th>
                <th>Desarrollador</th>
                <th>Reseñas</th>
                <th>Etiquetas</th>
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
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection


