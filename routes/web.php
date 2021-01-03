<?php

use App\Http\Controllers\PositionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Positions
Route::get('/positions', [PositionsController::class, 'index'])->name('positions');
Route::post('/positions', [PositionsController::class, 'store']);
Route::get('/positions/{slug}', [PositionsController::class, 'show'])->name('positions.show');
Route::get('/positions/create', [PositionsController::class, 'create'])->name('positions.create');
Route::get('/positions/{slug}/edit', [PositionsController::class, 'edit'])->name('positions.edit');
Route::put('/positions/{slug}', [PositionsController::class, 'update'])->name('positions.update');

require __DIR__ . '/auth.php';
