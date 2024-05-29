@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Desarrolladores</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($desarrolladores as $desarrollador)
            <tr>
                <td>{{ $desarrollador->nombre }}</td>
                <td>{{ $desarrollador->apellido }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
