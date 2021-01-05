<?php

use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\PositionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Employees
Route::get('/employees', [EmployeesController::class, 'index'])->name('employees');
Route::get('/employees/{employe}', [EmployeesController::class, 'show'])->name('employees.show');
Route::get('/employees/{employe}/edit', [EmployeesController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{employe}', [EmployeesController::class, 'update'])->name('employees.update');

// Availability
Route::post('/employees/availability', [AvailabilityController::class, 'update'])->name('availability.update');

// Positions
Route::get('/positions', [PositionsController::class, 'index'])->name('positions');
Route::post('/positions', [PositionsController::class, 'store']);
Route::get('/positions/create', [PositionsController::class, 'create'])->name('positions.create');
Route::get('/positions/{slug}', [PositionsController::class, 'show'])->name('positions.show');
Route::get('/positions/{slug}/edit', [PositionsController::class, 'edit'])->name('positions.edit');
Route::put('/positions/{slug}', [PositionsController::class, 'update'])->name('positions.update');

require __DIR__ . '/auth.php';
