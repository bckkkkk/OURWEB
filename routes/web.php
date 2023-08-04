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

Route::get('/events/attend', function () {
    return view('events.attend');
}) -> name('attend');

Route::get('/events/interest', function () {
    return view('events.interest');
}) -> name('interest');

Route::get('/events/hold', function () {
    return view('events.hold');
}) -> name('hold');

Route::resource('prefers',\App\Http\Controllers\PreferController::class)
    ->only(['store','destroy'])
    ->middleware(['auth', 'verified']);
Route::resource('joiners',\App\Http\Controllers\JoinerController::class)
    ->except('index')
    ->middleware(['auth', 'verified']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
