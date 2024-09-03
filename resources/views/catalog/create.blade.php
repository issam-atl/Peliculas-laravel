@extends('layouts.master')

@section('content')
    <h1>Crear Nueva Película</h1>

    {{-- Mostrar errores de validación si los hay --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulario para crear una nueva película --}}
    <form action="{{ url('/catalog/create') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Año</label>
            <input type="number" class="form-control" id="year" name="year" value="{{ old('year') }}">
        </div>

        <div class="mb-3">
            <label for="director" class="form-label">Director</label>
            <input type="text" class="form-control" id="director" name="director" value="{{ old('director') }}">
        </div>

        <div class="mb-3">
            <label for="poster" class="form-label">Póster (URL)</label>
            <input type="text" class="form-control" id="poster" name="poster" value="{{ old('poster') }}">
        </div>

        <div class="mb-3">
            <label for="synopsis" class="form-label">Sinopsis</label>
            <textarea class="form-control" id="synopsis" name="synopsis">{{ old('synopsis') }}</textarea>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="rented" name="rented"
                {{ old('rented') ? 'checked' : '' }}>
            <label class="form-check-label" for="rented">¿Alquilada?</label>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
