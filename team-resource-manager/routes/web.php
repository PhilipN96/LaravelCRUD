<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/', 'home');

use App\Http\Controllers\ResourceController;

Route::get('/', function () {
    return redirect()->route('resources.index');
});

Route::resource('resources', ResourceController::class);
