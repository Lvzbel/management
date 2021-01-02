<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        'message' => 'Testing variable from vue'
    ]);
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
