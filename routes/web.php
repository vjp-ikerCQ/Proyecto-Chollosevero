<?php

use App\Http\Controllers\CholloController;
use Illuminate\Support\Facades\Route;

// Ruta principal que redirige al listado de chollos automáticamente
Route::get('/', function () {
    return redirect()->route('chollos.index');
});

// Rutas de recurso para el controlador CholloController
// Esto crea automáticamente todas las rutas necesarias (index, create, store, edit, update, destroy, show)
Route::resource('chollos', CholloController::class);