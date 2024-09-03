<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\Validator;

class APICatalogController extends Controller
{
    public function index()
    {
        return response()->json(Movie::all());
    }

    public function show($id)
    {
        $movie = Movie::find($id);

        if ($movie) {
            return response()->json($movie);
        } else {
            return response()->json(['error' => 'Película no encontrada'], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'year' => 'required|integer',
            'director' => 'required|string',
            'poster' => 'string',
            'synopsis' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $movie = new Movie($request->all());
        $movie->rented = false;
        $movie->save();

        return response()->json(['msg' => 'Película creada correctamente']);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'string',
            'year' => 'integer',
            'director' => 'string',
            'poster' => 'string',
            'synopsis' => 'string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $movie = Movie::find($id);

        if ($movie) {
            $movie->update($request->all());
            return response()->json(['msg' => 'Película actualizada correctamente']);
        } else {
            return response()->json(['error' => 'Película no encontrada'], 404);
        }
    }

    public function destroy($id)
    {
        $movie = Movie::find($id);

        if ($movie) {
            $movie->delete();
            return response()->json(['msg' => 'Película eliminada correctamente']);
        } else {
            return response()->json(['error' => 'Película no encontrada'], 404);
        }
    }

    public function putRent($id)
    {
        $movie = Movie::find($id);

        if ($movie) {
            $movie->rented = true;
            $movie->save();
            return response()->json(['msg' => 'Película marcada como alquilada']);
        } else {
            return response()->json(['error' => 'Película no encontrada'], 404);
        }
    }

    public function putReturn($id)
    {
        $movie = Movie::find($id);

        if ($movie) {
            $movie->rented = false;
            $movie->save();
            return response()->json(['msg' => 'Película marcada como devuelta']);
        } else {
            return response()->json(['error' => 'Película no encontrada'], 404);
        }
    }
}
