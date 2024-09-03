@extends('layouts.master')

@section('content')
    <h2>Editar película</h2>
    <!-- Formulario de edición de películas -->
    <form method="POST" action="/catalog/edit/{{ $movie->id }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $movie->title }}" required>
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Año</label>
            <input type="text" class="form-control" id="year" name="year" value="{{ $movie->year }}" required>
        </div>

        <div class="mb-3">
            <label for="director" class="form-label">Director</label>
            <input type="text" class="form-control" id="director" name="director" value="{{ $movie->director }}"
                required>
        </div>

        <div class="mb-3">
            <label for="poster" class="form-label">URL del Póster</label>
            <input type="text" class="form-control" id="poster" name="poster" value="{{ $movie->poster }}" required>
        </div>

        <div class="mb-3">
            <label for="synopsis" class="form-label">Sinopsis</label>
            <textarea class="form-control" id="synopsis" name="synopsis" rows="3" required>{{ $movie->synopsis }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
@endsection
