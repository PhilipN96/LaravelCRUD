<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ReportEntryController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect()->route('resources.index');
});

// Gäste: Registrierung und Login
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Geschützte Bereiche – nur für angemeldete Benutzer
Route::middleware('auth')->group(function () {
    // Alle angemeldeten Benutzer dürfen die Ressourcenübersicht sehen
    Route::get('resources', [ResourceController::class, 'index'])->name('resources.index');

    // Ressourcen anlegen/bearbeiten/löschen sowie die Nutzerverwaltung
    // sind Administratoren vorbehalten
    Route::middleware('can:admin')->group(function () {
        Route::resource('resources', ResourceController::class)->except(['index', 'show']);

        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::patch('users/{user}/role', [UserController::class, 'updateRole'])->name('users.role');
    });

    Route::resource('report-entries', ReportEntryController::class);
});
