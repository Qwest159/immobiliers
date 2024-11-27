<?php

use App\Models\Maison;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\MaisonController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    //INDEX
    Route::get('/maisons', function () {
        $maisons = Maison::all();
        return Inertia::render('Maison', ['maisons' => $maisons]);
    })->name('maisons.index');




    // CREATE
    Route::get('/maisons/create', function () {
        return Inertia::render('MaisonCreate');
    })->name('maisons.create');

    Route::post('/maisons/store', [MaisonController::class, "store"])->name('maisons.store');
    // Route::get('/maisons/edit', [MaisonController::class, "edit"])->name('maisons.edit');
    Route::get('/maisons/edit/{id}', function () {
        return Inertia::render('EditMaison');
    })->name('maisons.edit');

    Route::delete('/maisons/delete', [MaisonController::class, "delete"])->name('maisons.delete');
});
