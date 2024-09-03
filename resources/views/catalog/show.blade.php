@extends('layouts.master')

@section('content')
    <h2>{{ $movie->title }}</h2>
    <img src="{{ asset('imgg/1.jpg') }}" alt="Nombre de la película" style="max-width: 400px; height: auto;">
    <p>Año: {{ $movie->year }}</p>
    <p>Director: {{ $movie->director }}</p>
    <p>Estado: {{ $movie->rented ? 'Alquilada' : 'Disponible' }}</p>
    <p>Sinopsis: {{ $movie->synopsis }}</p>

    <!-- Formulario para alquilar película -->
    @if (!$movie->rented)
        <form action="{{ action([App\Http\Controllers\CatalogController::class, 'putRent'], ['id' => $movie->id]) }}"
            method="POST" style="display:inline">
            @method('PUT')
            @csrf
            <button type="submit" class="btn btn-success" style="display:inline">
                Alquilar película
            </button>
        </form>
    @else
        <!-- Formulario para devolver película -->
        <form action="{{ action([App\Http\Controllers\CatalogController::class, 'putReturn'], ['id' => $movie->id]) }}"
            method="POST" style="display:inline">
            @method('PUT')
            @csrf
            <button type="submit" class="btn btn-danger" style="display:inline">
                Devolver película
            </button>
        </form>
    @endif

    <!-- Formulario para editar película -->
    <a href="{{ action([App\Http\Controllers\CatalogController::class, 'getEdit'], ['id' => $movie->id]) }}"
        class="btn btn-primary">Editar película</a>

    <!-- Formulario para eliminar película -->
    <form action="{{ action([App\Http\Controllers\CatalogController::class, 'deleteMovie'], ['id' => $movie->id]) }}"
        method="POST" style="display:inline">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-warning" style="display:inline">
            Eliminar película
        </button>
    </form>
    <!-- Botón para volver al catálogo -->
    <a href="{{ url('/catalog') }}" class="btn btn-secondary">Volver al catálogo</a>
@endsection
