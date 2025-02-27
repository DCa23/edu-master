<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('home');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'show'])->name('dashboard');
    Route::resource('tasks', TaskController::class);
});

Route::get('testing', function (Request $request) {
    dd($request->user()->students[0]->teachers, $request->user()->teachers);
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
