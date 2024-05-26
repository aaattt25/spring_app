<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\SpringController;
use App\Models\Spring;

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

// Route::resource('springs', SpringController::class)->middleware(['auth', 'verified']);

Route::get('/springs', [SpringController::class, 'index'])->middleware(['auth'])->name('springs.index');
Route::post('/springs', [SpringController::class, 'store'])->middleware(['auth', 'can:admin'])->name('springs.store');
Route::get('/springs/create', [SpringController::class, 'create'])->middleware(['auth','can:admin'])->name('springs.create');
Route::get('/springs/{spring}', [SpringController::class, 'show'])->middleware(['auth'])->name('springs.show');
Route::put('/springs/{spring}', [SpringController::class, 'update'])->middleware(['auth','can:admin'])->name('springs.update');
Route::delete('/springs/{spring}', [SpringController::class, 'destroy'])->middleware(['auth','can:admin'])->name('springs.destroy');
Route::get('/springs/{spring}/edit', [SpringController::class, 'edit'])->middleware(['auth', 'can:admin'])->name('springs.edit');

Route::post('/springs/{spring}/change-image', [SpringController::class, 'changeImage'])->middleware(['auth'])->name('change-image');
Route::delete('/springs/{spring}/delete-image', [SpringController::class, 'deleteImage'])->middleware(['auth'])->name('delete-image');


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
