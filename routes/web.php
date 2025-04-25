<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

Route::prefix('')->group(function () {
    Route::get('/user', function () {return view('layout.user');})->name('user');
    Route::get('/admin', function () {return view('layout.admin');})->name('admin');
    Route::get('/', function () {return view('layout.landingPage'); })->name('landingPage');
});

Route::prefix('client')->group(function () {
    Route::get('/index', [ClientController::class, 'index'])->name('clients.index');
    Route::get('/create', [ClientController::class, 'create'])->name('clients.create');
    Route::get('/edit/{id}', [ClientController::class, 'edit'])->name('clients.edit');
    Route::get('/show/{id}', [ClientController::class, 'show'])->name('clients.show');
    Route::get('/destroy/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');
    Route::post('/store', [ClientController::class, 'store'])->name('clients.store');
    Route::put('/update/{id}', [ClientController::class, 'update'])->name('clients.update');
    Route::get('/destroyAll', [ClientController::class, 'destroyAll'])->name('clients.destroyAll');
    Route::get('/search', [ClientController::class, 'search'])->name('clients.search');
    Route::get('/searchByName', [ClientController::class, 'searchByName'])->name('clients.searchByName');
    Route::get('/searchByEmail', [ClientController::class, 'searchByEmail'])->name('clients.searchByEmail');
});


Route::prefix('pages')->group(function () {
    Route::get('/dashboard', function () {return view('pages.dashboard');})->name('dashboard');
    Route::get('/profile',[ClientController::class, 'profile'])->name('profile');
});

