<?php

use App\Http\Controllers\DemandeController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DossierController;
use App\Http\Controllers\ObservationController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\StructureController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('/', DemandeController::class);

Route::get('/dashboard', [DemandeController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/bienvenue', [UserController::class, 'bienvenue'])->name('bienvenue.bienvenue');

    Route::resource('users-profile', StageController::class)->only(['show']);
    Route::resource('structure', StructureController::class);
    Route::resource('service', ServiceController::class);
    Route::resource('personnels', PersonnelController::class);
    Route::resource('stagiaire', StagiaireController::class);
    Route::resource('document', DocumentController::class);
    Route::resource('observation', ObservationController::class);

    Route::post('/stage/{id}/validate', 'App\Http\Controllers\StageController@validate')->name('stage.validate');
    Route::post('/stage/{id}/reject', 'App\Http\Controllers\StageController@reject')->name('stage.reject');
    Route::post('/stage/{id}/traite', 'App\Http\Controllers\StageController@traite')->name('stage.traite');

    Route::patch('/personnels/{id}/activate', 'App\Http\Controllers\PersonnelController@activate')->name('personnels.activate');
    Route::patch('/personnels/{id}/deactivate', 'App\Http\Controllers\PersonnelController@deactivate')->name('personnels.deactivate');
    Route::resource('personnel-profile', PersonnelController::class)->only(['show']);
    Route::get('/stagiaire-profile/{id}', [StagiaireController::class, 'show1'])->name('stagiaire-profile.show1');

    Route::post('/check-email', [StagiaireController::class, 'checkEmail'])->name('check.email');
    Route::post('/suivi', [StagiaireController::class, 'suivi'])->name('stagiaire.suivi');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile',  [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('stage', StageController::class);

Route::resource('contact', UserController::class);
Route::get('/apropos', [UserController::class, 'propos'])->name('apropos.propos');

Route::post('/stagiaire/suivi', [StagiaireController::class, 'suivi'])->name('stagiaire.create');

Route::get('/creer-admin', [UserController::class, 'createAdminAccount']);

Route::get('/reclamation/{id}', [StageController::class, 'showReclamationForm'])->name('stage.reclamation');
Route::post('/reclamation/{id}', [StageController::class, 'submitReclamationForm'])->name('stage.submitReclamation');

require __DIR__.'/auth.php';
