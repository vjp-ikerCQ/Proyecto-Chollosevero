<?php

use App\Http\Controllers\CholloController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('chollos.index');
});

Route::resource('chollos', CholloController::class);