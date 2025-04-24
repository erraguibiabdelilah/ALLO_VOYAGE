<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

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

Route::get('/voyage.voyage', function () {
    return view('voyage.voyage');
})->name('voyages');

Route::get('/reservations', function () {
    return view('reservation.reservation');
})->name('reservations');


Route::get('/profile',[ClientController::class, 'profile'])->name('profile');

