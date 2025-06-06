<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\VoyageController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\LoginConttroller;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NotificationController;

Route::resource('admins', AdminController::class);
Route::prefix('')->group(function () {
    Route::get('/user',[ClientController::class, 'index'])->name('user');
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
});

//->middleware(['auth'])
Route::prefix('reservations')->group(function () {
    Route::get('/', [ReservationController::class, 'index'])->name('reservations.index');
    Route::get('/create/{id}', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/', [ReservationController::class, 'store'])->name('reservations.store');
    Route::get('/{reservation}', [ReservationController::class, 'show'])->name('reservations.show');
    Route::delete('/{reservation}', [ReservationController::class, 'destroy'])->name('reservations.destroy');
});
Route::get('/paiement/{total?}/{nbrplace?}', [PaiementController::class, 'index'])->name('paiement');

Route::prefix('voyages')->group(function () {

    Route::get('/', [VoyageController::class, 'index'])->name('voyages.index');
    Route::get('/create', [VoyageController::class, 'create'])->name('voyages.create');
    Route::post('/', [VoyageController::class, 'store'])->name('voyages.store');
    Route::get('/{voyage}', [VoyageController::class, 'show'])->name('voyages.show');
    Route::get('/{voyage}/edit', [VoyageController::class, 'edit'])->name('voyages.edit');
    Route::put('/{voyage}', [VoyageController::class, 'update'])->name('voyages.update');
    Route::delete('/{voyage}', [VoyageController::class, 'destroy'])->name('voyages.destroy');
});

Route::get('/authentification', [LoginConttroller::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginConttroller::class, 'login'])->name('loginPost');
Route::post('/register', [ClientController::class, 'register'])->name('register');
Route::match(['get', 'post'], '/logout', [LoginConttroller::class, 'logout'])->name('logout');

Route::get( '/resultSearch',function(){return view('Pages.resultSearch');})->name('resultSearch');
Route::post('voyage/search',[SearchController::class ,'findByDepartAndDestinationAndDepartDate'])->name('findVoyage');
Route::get('voyage/search',[SearchController::class ,'findByDepartAndDestinationAndDepartDate'])->name('findVoyage');
Route::post('/savePaiment',[NotificationController::class ,'create'])->name('notifications.create');

Route::get('/myreservations', [ReservationController::class, 'AllMyReservations'])->name('myreservations');
Route::post('/myreservations/supprimer/{id}', [ReservationController::class, 'supprimer'])->name('supprimer');

Route::get('/profile', [ClientController::class, 'profile'])->name('profile');
Route::put('/profile/update/{id}', [ClientController::class, 'updateProfile'])->name('profile.update');