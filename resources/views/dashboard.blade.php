@extends('layouts.app')

@section('title', 'Panel de Control')

@section('content')
    <h1>Panel de Control</h1>
    <ul>
        <li><a href="{{ route('videojuegos.index') }}">Videojuegos</a></li>
        <li><a href="{{ route('desarrolladores.index') }}">Desarrolladores</a></li>
        <li><a href="{{ route('resenas.index') }}">Reseñas</a></li>
        <li><a href="{{ route('etiquetas.index') }}">Etiquetas</a></li>
    </ul>
@endsection

