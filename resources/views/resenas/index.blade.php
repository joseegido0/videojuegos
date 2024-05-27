@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Reseñas</h1>
    <table class="table">
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
