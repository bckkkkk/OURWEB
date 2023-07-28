<?php

use App\Http\Controllers\ProfileController;
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

Route::resource('articles',\App\Http\Controllers\ArticleController::class);


/*Route::get('/', function () {
    return view('welcome');
});   ->middleware(['auth', 'verified'])*/

Route::get('/', [\App\Http\Controllers\ArticleController::class, "index"] 
)->name('dashboard');


Route::resource('prefers',\App\Http\Controllers\PreferController::class)
    ->only(['store'])
    ->middleware(['auth', 'verified']);
Route::resource('joiners',\App\Http\Controllers\JoinerController::class)
    ->only(['store','create', 'show'])
    ->middleware(['auth', 'verified']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
