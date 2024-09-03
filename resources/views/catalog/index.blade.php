@extends('layouts.master')

@section('content')
    <div class="row">
        @foreach ($movies as $movie)
            <div class="col-md-4">
                <div class="movie">
                    <a href="{{ url('/catalog/show/' . $movie->id) }}" class="text-decoration-none text-dark">
                        <img src="{{ asset('imgg/1.jpg') }}" alt="Nombre de la película" style="max-width:100%; height: auto;">
                        <h2 class="text-center mt-2 mb-3">{{ $movie->title }}</h2>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
