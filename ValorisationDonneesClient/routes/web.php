<?php

use App\Models\Etablissement;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RechercheController;
use App\Http\Controllers\EtablisementControlleur;
use App\Http\Controllers\AjoutEntrepriseControlleur;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/recherche', [RechercheController::class, 'recherche'])->middleware(['auth', 'verified'])->name('search');
Route::post('/comments/store', [EtablisementControlleur::class, 'store'])->name('comments.store')->middleware(['auth', 'verified']);
Route::get('/Etab/{siret}', [EtablisementControlleur::class, 'show'])->middleware(['auth', 'verified'])->name('etablissement.show');
Route::get('/AjoutEntreprise', [AjoutEntrepriseControlleur::class, 'index'])->middleware(['auth', 'verified'])->name('AjoutEntreprise');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
