@extends('layouts.app')

@section('title', 'Lista de Etiquetas')

@section('content')
<div class="container">
    <h1 class="my-4">Lista de Etiquetas</h1>
    <a href="{{ route('etiquetas.create') }}" class="btn btn-primary mb-3">Crear Nueva Etiqueta</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($etiquetas as $etiqueta)
            <tr>
                <td>{{ $etiqueta->nombre }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection


