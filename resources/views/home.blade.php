@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 style="color: #ef2c00;">Bienvenido a nuestro Videoclub</h1>
                <p>Explora nuestra colección de películas y encuentra tus favoritas.</p>
                <p>Desde clásicos atemporales hasta los últimos estrenos, ¡tenemos todo lo que
                    necesitas para tu próxima noche de cine!</p>
                <p>Regístrate para acceder a funciones adicionales como alquilar películas y
                    agregarlas a tu lista de favoritos.</p>
                <a href="{{ url('/catalog') }}" class="btn btn-primary btn-lg">Explorar
                    catálogo</a>
            </div>
        </div>
    </div>
@endsection
