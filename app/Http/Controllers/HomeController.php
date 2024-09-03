<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getHome()
    {
        // Devuelve la vista que contiene el contenido deseado para la página de inicio
        return view('home');
    }
}
