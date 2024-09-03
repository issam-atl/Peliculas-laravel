<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APICatalogController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware(['auth.basic.once'])->prefix('v1')->group(function () {
    Route::get('/catalog', [APICatalogController::class, 'index']);
    Route::get('/catalog/{id}', [APICatalogController::class, 'show']);
    Route::post('/catalog', [APICatalogController::class, 'store']);
    Route::put('/catalog/{id}', [APICatalogController::class, 'update']);
    Route::delete('/catalog/{id}', [APICatalogController::class, 'destroy']);
    Route::put('/catalog/{id}/rent', [APICatalogController::class, 'putRent']);
    Route::put('/catalog/{id}/return', [APICatalogController::class, 'putReturn']);
});