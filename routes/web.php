<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|*/

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'getHome']);
    Route::get('/catalog', [CatalogController::class, 'getIndex']);
    Route::get('/catalog/show/{id}', [CatalogController::class, 'getShow']);
    Route::get('/catalog/create', [CatalogController::class, 'getCreate']);
    Route::get('/catalog/edit/{id}', [CatalogController::class, 'getEdit']);

    // Ruta para procesar el formulario de creación de películas
    Route::post('/catalog/create', [CatalogController::class, 'postCreate']);

    // Ruta para procesar el formulario de edición de películas
    Route::put('/catalog/edit/{id}', [CatalogController::class, 'putEdit']);

    // Ruta para alquilar una película
    Route::put('/catalog/rent/{id}', [CatalogController::class, 'putRent']);

    // Ruta para devolver una película
    Route::put('/catalog/return/{id}', [CatalogController::class, 'putReturn']);

    // Ruta para eliminar una película
    Route::delete('/catalog/delete/{id}', [CatalogController::class, 'deleteMovie']);
});
Auth::routes();
