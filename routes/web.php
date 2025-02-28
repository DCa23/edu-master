<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use App\Models\Task;
use App\Models\TaskQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('home');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'show'])->name('dashboard');
    Route::resource('tasks', TaskController::class);
});

Route::get('testing', function (Request $request) {
    $task = Task::all()->first();

    $question = TaskQuestion::factory()->create(['task_id' => $task->id]);
    // $task->task_questions()->attach($question);

    // dd($tasks[0]->users, $tasks[0]->teachers, $tasks[0]->students);
    // dd($request->user()->students[1]->tasks);
    // dd($request->user()->tasks);
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
