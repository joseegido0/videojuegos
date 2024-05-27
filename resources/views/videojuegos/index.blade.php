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
            </tr>
        </thead>
        <tbody>
            @foreach ($videojuegos as $videojuego)
            <tr>
                <td>{{ $videojuego->titulo }}</td>
                <td>{{ $videojuego->descripcion }}</td>
                <td>{{ $videojuego->fecha_lanzamiento }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

