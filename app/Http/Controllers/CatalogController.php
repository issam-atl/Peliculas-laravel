<?php

namespace App\Http\Controllers;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Models\Movie;

class CatalogController extends Controller
{


    public function getIndex()
    {
        $movies = Movie::all();
        return view('catalog.index', ['movies' => $movies]);
    }

    public function getShow($id)
    {
        $pelicula = Movie::findOrFail($id);

        return view('catalog.show', ['movie' => $pelicula]);
    }

    public function getEdit($id)
    {
        $movie = Movie::findOrFail($id); // Obtener la película por ID

        return view('catalog.edit', ['movie' => $movie]);
    }
    public function getCreate()
    {
        return view('catalog.create');
    }

    public function postCreate(Request $request)
    {
        $pelicula = new Movie();
        $pelicula->title = $request->input('title');
        $pelicula->year = $request->input('year');
        $pelicula->director = $request->input('director');
        $pelicula->poster = $request->input('poster');
        $pelicula->synopsis = $request->input('synopsis');
        // Asignar por defecto el valor "false" al campo "rented"
        $pelicula->rented = false;
        $pelicula->save();

        Flash::success('La película se ha guardado correctamente.');

        return redirect('/catalog');
    }

    public function putEdit(Request $request, $id)
    {
        $pelicula = Movie::findOrFail($id);
        $pelicula->title = $request->input('title');
        $pelicula->year = $request->input('year');
        $pelicula->director = $request->input('director');
        $pelicula->poster = $request->input('poster');
        $pelicula->synopsis = $request->input('synopsis');
        $pelicula->save();

        Flash::success('La película se ha editado correctamente.');

        return redirect('/catalog/show/' . $id);
    }
    public function putRent($id)
    {
        $pelicula = Movie::findOrFail($id);
        $pelicula->rented = true;
        $pelicula->save();

        Flash::success('La película se ha alquilado correctamente.');

        return redirect('/catalog/show/' . $id);
    }

    public function putReturn($id)
    {
        $pelicula = Movie::findOrFail($id);
        $pelicula->rented = false;
        $pelicula->save();

        Flash::success('La película se ha devuelto correctamente.');

        return redirect('/catalog/show/' . $id);
    }

    public function deleteMovie($id)
    {
        $pelicula = Movie::findOrFail($id);
        $pelicula->delete();

        Flash::success('La película se ha eliminado correctamente.');

        return redirect('/catalog');
    }

}
