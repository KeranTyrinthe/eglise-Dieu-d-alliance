<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembreController;
use App\Http\Controllers\FinanceController;

// Route racine - Login
Route::get('/', function () {
    return view('auth.login');
});

// Route de test
Route::get('/test', function () {
    return 'Laravel fonctionne correctement !';
});

// Menu principal (Panel admin)
Route::get('/backoffice/menu', function () {
    return view('backoffice.menu');
})->name('backoffice.menu');

// Dashboard de gestion de membre
Route::get('/backoffice/gestion-membre/dashboard', [MembreController::class, 'dashboard'])->name('backoffice.gestion-membre.dashboard');


// Gestion des Membres
Route::get('/backoffice/gestion-membre/membres-list', [MembreController::class, 'index'])->name('backoffice.membres-list');
Route::get('/backoffice/gestion-membre/create', [MembreController::class, 'create'])->name('membres.create');
Route::post('/backoffice/gestion-membre/store', [MembreController::class, 'store'])->name('membres.store');
Route::get('/backoffice/gestion-membre/{id}', [MembreController::class, 'show'])->name('membres.show');
Route::get('/backoffice/gestion-membre/{id}/edit', [MembreController::class, 'edit'])->name('membres.edit');
Route::put('/backoffice/gestion-membre/{id}', [MembreController::class, 'update'])->name('membres.update');
Route::delete('/backoffice/gestion-membre/{id}', [MembreController::class, 'destroy'])->name('membres.destroy');

// Gestion Financière
Route::get('/backoffice/gestion-financiere/dashboard', [FinanceController::class, 'dashboard'])->name('finances.dashboard');
Route::get('/backoffice/gestion-financiere/analytiques', [FinanceController::class, 'analytiques'])->name('finances.analytiques');
Route::get('/backoffice/gestion-financiere/transactions', [FinanceController::class, 'transactions'])->name('finances.transactions');
Route::get('/backoffice/gestion-financiere/rapports', [FinanceController::class, 'rapports'])->name('finances.rapports');
Route::post('/backoffice/gestion-financiere/store', [FinanceController::class, 'store'])->name('finances.store');
Route::put('/backoffice/gestion-financiere/{id}', [FinanceController::class, 'update'])->name('finances.update');
Route::delete('/backoffice/gestion-financiere/{id}', [FinanceController::class, 'destroy'])->name('finances.destroy');

/*Route::get('/dashboard', function () {
return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
