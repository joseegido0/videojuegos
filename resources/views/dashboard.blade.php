@extends('layouts.app')

@section('title', 'Panel de Control')

@section('content')
<div class="container">
    <h1 class="my-4">Panel de Control</h1>
    <div class="list-group">
        <a href="{{ route('videojuegos.index') }}" class="list-group-item list-group-item-action">Videojuegos</a>
        <a href="{{ route('desarrolladores.index') }}" class="list-group-item list-group-item-action">Desarrolladores</a>
        <a href="{{ route('resenas.index') }}" class="list-group-item list-group-item-action">Reseñas</a>
        <a href="{{ route('etiquetas.index') }}" class="list-group-item list-group-item-action">Etiquetas</a>
    </div>
</div>
@endsection


