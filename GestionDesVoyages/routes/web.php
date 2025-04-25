<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\VoyageController;


Route::get('/', function () {
    return view('layout.admin');
});

Route::get('/user', function () {
    return view('layout.user');
});


Route::get('/client', function () {
    return view('client.client');
})->name('clients');

Route::post('/savingClient', [ClientController::class, 'store'])->name('clients.store');
Route::put('/update/{id}', [ClientController::class, 'update'])->name('clients.update');

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->name('dashboard');

Route::prefix('voyages')->group(function () {
    // Liste des voyages
    Route::get('/', [VoyageController::class, 'index'])->name('voyages.index');
    
    // Formulaire de création
    Route::get('/create', [VoyageController::class, 'create'])->name('voyages.create');
    
    // Enregistrement d'un nouveau voyage
    Route::post('/', [VoyageController::class, 'store'])->name('voyages.store');
    
    // Affichage d'un voyage spécifique
    Route::get('/{voyage}', [VoyageController::class, 'show'])->name('voyages.show');
    
    // Formulaire d'édition
    Route::get('/{voyage}/edit', [VoyageController::class, 'edit'])->name('voyages.edit');
    
    // Mise à jour d'un voyage
    Route::put('/{voyage}', [VoyageController::class, 'update'])->name('voyages.update');
    
    // Suppression d'un voyage
    Route::delete('/{voyage}', [VoyageController::class, 'destroy'])->name('voyages.destroy');
});

Route::get('/reservations', function () {
    return view('reservation.reservation');
})->name('reservations');
