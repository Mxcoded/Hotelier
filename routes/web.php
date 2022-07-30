<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ActivitesController;
use App\Http\Controllers\ModuleProgrammeController;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\ModuleController;

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

Route::get('admin', [AdminController::class, 'adminHome'])->name('admin/home')->middleware(['auth']);

// gestion des categories d'annonces ou d'activites
Route::get('categories', [CategorieController::class, 'index']);
Route::get('categories/store', [CategorieController::class, 'store']);

// gestion des annonces
Route::get('annonces/index', [AnnonceController::class, 'index'])->name('annonces');
Route::get('annonces/ajouter', [AnnonceController::class, 'create'])->name('annonces/creer')->middleware(['auth']);
Route::post('annonces/store', [AnnonceController::class, 'store'])->name('annonces/store')->middleware(['auth']);
Route::get('annonces/editer/{id}', [AnnonceController::class, 'edit'])->name('annonces/edit')->middleware(['auth']);
Route::put('annonces/modifier/{id}', [AnnonceController::class, 'update'])->name('annonces/modifier')->middleware(['auth']);
Route::put('annonces/supprimer/{id}', [AnnonceController::class, 'destroy'])->name('annonces/destroy')->middleware(['auth']);
Route::get('annonces/detail/{id}', [AnnonceController::class, 'show'])->name('annonces/detail');


// gestion des activites
Route::resource("activites", ActivitesController::class)->middleware(['auth']);
Route::get("activites/{id}/commenter", [ActivitesController::class, 'commenter'])->name('activites.commentaire');
Route::post("activites/comment/{id}", [ActivitesController::class, 'commenterStore'])->name('activites.commenter');

// gestion des modules et programmes

//modules
Route::resource("modules", ModuleController::class);
/*
Route::get("module/ajouter", [ModuleProgrammeController::class, 'editerModule']);
Route::get("module/index", [ModuleProgrammeController::class, 'index']);
Route::get("programme/store", [ModuleProgrammeController::class, 'store_programme']);
 */
Route::get("programme/index", [ModuleProgrammeController::class, 'indexProgramme'])->name('programme.index');
Route::get("programme/editer", [ModuleProgrammeController::class, 'createProgramme'])->name("programmer");
Route::post("programme/publier", [ModuleProgrammeController::class, 'publierProgramme'])->name("programme/publier");
Route::get("programme/{id}/detail", [ModuleProgrammeController::class, 'show'])->name('programme.show');



Route::get('bureau/esi', [DefaultController::class, 'bureauEsi'])->name('bureau.esi');

Route::get('about', function () {
    return view('about');
});

Route::get('/', function () {
    return view('index');
})->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';