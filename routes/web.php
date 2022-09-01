<?php

use App\Http\Controllers\ListController;
use Illuminate\Support\Facades\Route;

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
})->name("accueil");

route::get("/etudiant",[ListController::class, "index"])->name("etudiant");
route::get("/etudiant/create",[ListController::class, "create"])->name("etudiant.create");

route::get("/etudiant/{etudiant}",[ListController::class, "edit"])->name("etudiant.edit");



route::post("/etudiant/create",[ListController::class, "store"])->name("etudiant.ajouter");
route::delete("/etudiant/{etudiant}",[ListController::class, "delete"])->name("etudiant.supprimer");
route::put("/etudiant/{etudiant}",[ListController::class, "update"])->name("etudiant.update");