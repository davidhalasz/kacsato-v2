<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Controller;
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
    return view('fooldal');
})->name('fooldal');

Route::get('/rolunk/megkozelites', function () {
    return view('megkozelites');
})->name('megkozelites');

Route::get('/latnivalok/szarvas', [Controller::class, 'getSzarvasImages'])->name('szarvas-latnivalok');

Route::get('/esemenynaptar', [Controller::class, 'getEvents'])->name('esemenynaptar');

Route::get('/galeria', [Controller::class, 'getAlbums'])->name('galeria');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
