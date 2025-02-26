<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('testing', function (Request $request) {
    // $user = User::factory()->create();
    // $request->user()->students()->attach($user);

    dd($request->user()->students);
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
