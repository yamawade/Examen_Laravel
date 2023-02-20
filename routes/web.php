<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\ReferentielController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\StatistiqueController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//FORMATION
Route::get('/formation/create', [FormationController::class, 'create'])->name('homepage');
Route::post('/store', [FormationController::class, 'store']);
Route::get('/formation/index', [FormationController::class, 'index'])->name('formation.index');
Route::get('/formation/edit/{id}', [FormationController::class, 'edit'])->name('formation.editformation');
Route::post('/formation/edit/{id}', [FormationController::class, 'updateFormation']);
Route::delete('/formation/index/{id}', [FormationController::class, 'destroyFormation'])->name('formation.delete');

//CANDIDAT
Route::get('/candidat/create', [CandidatController::class, 'create'])->name('candidatpage');
Route::post('/storeCandidat', [CandidatController::class, 'storeCandidat']);
Route::get('/candidat/indexCandidat', [CandidatController::class, 'index'])->name('candidat.index');
Route::get('/candidat/editCandidat/{id}', [CandidatController::class, 'edit'])->name('candidat.edit');
Route::post('/candidat/editCandidat/{id}', [CandidatController::class, 'update']);
Route::delete('/candidat/indexCandidat/{id}', [CandidatController::class, 'destroy'])->name('candidat.delete');

//REFERENRIEL
Route::get('/referentiel/create', [ReferentielController::class, 'create'])->name('referentielpage');
Route::post('/storeReferentiel', [ReferentielController::class, 'storeReferentiel']);
Route::get('/referentiel/indexReferentiel', [ReferentielController::class, 'index'])->name('referentiel.index');
Route::get('/referentiel/editReferentiel/{id}', [ReferentielController::class, 'edit'])->name('referentiel.edit');
Route::post('/referentiel/editReferentiel/{id}', [ReferentielController::class, 'update']);
Route::delete('/referentiel/indexReferentiel/{id}', [ReferentielController::class, 'destroy'])->name('referentiel.delete');

//TYPE
Route::get('/type/create', [TypeController::class, 'create'])->name('typepage');
Route::post('/storeType', [TypeController::class, 'storeType']);
Route::get('/type/indexType', [TypeController::class, 'index'])->name('type.index');
Route::get('/type/editType/{id}', [TypeController::class, 'edit'])->name('type.edit');
Route::post('/type/editType/{id}', [TypeController::class, 'update']);
Route::delete('/type/indexType/{id}', [TypeController::class, 'destroy'])->name('type.delete');


//STATISTIQUE
//Route::get('/statistique/create', [StatistiqueController::class,'create'])->name('statistiquepage');
Route::get('/dashboard', [StatistiqueController::class,'create'])->middleware(['auth', 'verified'])->name('dashboard');
