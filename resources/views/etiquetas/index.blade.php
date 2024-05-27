@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Etiquetas</h1>
    <table class="table">
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

