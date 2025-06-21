<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InscriptionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes d'inscription
Route::prefix('inscription')->name('inscription.')->group(function () {
    // Étape 1: Type d'inscription
    Route::get('/', [InscriptionController::class, 'step1'])->name('step1');
    Route::post('/step1', [InscriptionController::class, 'step1Store'])->name('step1.store');
    
    // Étape 2: Informations élève
    Route::get('/step2', [InscriptionController::class, 'step2'])->name('step2');
    Route::post('/step2', [InscriptionController::class, 'step2Store'])->name('step2.store');
    
    // Étape 3: Informations parents
    Route::get('/step3', [InscriptionController::class, 'step3'])->name('step3');
    Route::post('/step3', [InscriptionController::class, 'step3Store'])->name('step3.store');
    
    // Étape 4: Informations médicales
    Route::get('/step4', [InscriptionController::class, 'step4'])->name('step4');
    Route::post('/step4', [InscriptionController::class, 'step4Store'])->name('step4.store');
    
    // Étape 5: Fournitures
    Route::get('/step5', [InscriptionController::class, 'step5'])->name('step5');
    Route::post('/step5', [InscriptionController::class, 'step5Store'])->name('step5.store');
    
    // Étape 6: Récapitulatif
    Route::get('/step6', [InscriptionController::class, 'step6'])->name('step6');
    Route::post('/step6', [InscriptionController::class, 'step6Store'])->name('step6.store');
    
    // Étape 7: Validation
    Route::get('/{id}/validation', [InscriptionController::class, 'showStep7'])->name('step7');
    Route::post('/{id}/validation', [InscriptionController::class, 'validateInscription'])->name('step7.store');
    
    // Routes utilitaires
    Route::post('/save-session', [InscriptionController::class, 'saveSession'])->name('save-session');
    Route::get('/recherche', [InscriptionController::class, 'recherche'])->name('recherche');
    Route::get('/statistiques', [InscriptionController::class, 'statistiques'])->name('statistiques');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
