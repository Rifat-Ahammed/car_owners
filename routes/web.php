<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\OwnerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/owners', [OwnerController::class, 'index'])->name('owners.index');
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');

Route::middleware(['auth'])->group(function () {


    Route::post("owners/search", [OwnerController::class, 'search'])->name("owners.search")->middleware('replace');
    Route::post("cars/search", [CarController::class, 'search'])->name("cars.search");

    Route::resource("owners", OwnerController::class)->except(['index'])->middleware('admin');;
    Route::resource("cars", CarController::class)->except(['index'])->middleware('admin');
});
Route::get('/setLanguage/{lang}', [\App\Http\Controllers\LanguageController::class, 'setLanguage'])->name("lang");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
