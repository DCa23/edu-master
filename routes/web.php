<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('home');
Route::get('dashboard', [DashboardController::class, 'show'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('testing', function (Request $request) {
    dd($request->user()->students[0]->teachers, $request->user()->teachers);
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
