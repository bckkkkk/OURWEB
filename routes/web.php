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


Route::any('/articles/alltag', [\App\Http\Controllers\ArticleController::class, "showalltags"])->name('showalltags');

Route::resource('articles',\App\Http\Controllers\ArticleController::class);


/*Route::get('/', function () {
    return view('welcome');
});   ->middleware(['auth', 'verified'])*/

Route::get('/', [\App\Http\Controllers\ArticleController::class, "index"] 
)->name('dashboard');

Route::post('/joiner/check', [App\Http\Controllers\JoinerController::class, "blackcheck"] 
)->name('blackcheck');

Route::any('/check/decidedDate', [App\Http\Controllers\CheckController::class, "decidedDate"] 
)->name('decidedDate');
// Route::get('/check/decidedDate', [App\Http\Controllers\CheckController::class, "decidedDate"] 
// )->name('decidedDate');

Route::any('/joiners/gainCheck', [App\Http\Controllers\JoinerController::class, "gainCheck"] 
)->name('gainCheck');

//Route::any('/tags', [\App\Http\Controllers\ArticleController::class, "tagspage"] 
//)->name('tagspage');

Route::get('/articles/tag/{tag:slug}', [App\Http\Controllers\ArticleController::class, 'tagspage'])->name('tagspage');

Route::get('/about', function () {
    return view('footer.about');
})-> name('about');

Route::get('/apply', function () {
    return view('footer.apply');
}) ->middleware(['auth', 'verified']) -> name('apply');

Route::get('/announce', function () {
    return view('footer.announce');
}) ->middleware(['auth', 'verified']) -> name('announce');

Route::get('/connection', function () {
    return view('footer.connection');
})-> name('connection');

Route::get('/events/attend', function () {
    return view('events.attend');
}) ->middleware(['auth', 'verified']) -> name('attend');

Route::get('/events/interest', function () {
    return view('events.interest');
}) ->middleware(['auth', 'verified']) -> name('interest');

Route::get('/events/hold', function () {
    return view('events.hold');
}) ->middleware(['auth', 'verified']) -> name('hold');

Route::resource('prefers',\App\Http\Controllers\PreferController::class)
    ->only(['store','destroy'])
    ->middleware(['auth', 'verified']);
	
Route::resource('joiners',\App\Http\Controllers\JoinerController::class)
    ->except('index')
    ->middleware(['auth', 'verified']);
	
Route::resource('allow',\App\Http\Controllers\AllowController::class)
    ->only(['index', 'update', 'store']);

Route::resource('checks',\App\Http\Controllers\CheckController::class)
    ->only(['show', 'update', 'store']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
