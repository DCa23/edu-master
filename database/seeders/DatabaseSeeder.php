<?php

namespace Database\Seeders;

use App\Models\Enums\UserRoles;
use App\Models\Task;
use App\Models\TaskQuestion;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $tasks = Task::factory(2)->create();

        TaskQuestion::create([
            'question' => 'turtle',
            'answer' => 'sea animal',
            'task_id' => $tasks[0]->id,
        ]);

        TaskQuestion::create([
            'question' => 'tiger',
            'answer' => 'feline animal',
            'task_id' => $tasks[0]->id,
        ]);

        TaskQuestion::create([
            'question' => 'cto',
            'answer' => 'chief technology officer',
            'task_id' => $tasks[1]->id,
        ]);

        TaskQuestion::create([
            'question' => 'cpo',
            'answer' => 'chief product owner',
            'task_id' => $tasks[1]->id,
        ]);

        $student = User::factory()->recycle($tasks)->create([
            'name' => 'Test User',
            'email' => 'student@example.com',
            'role' => UserRoles::STUDENT->value,
        ]);

        $teacher = User::factory()
            ->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'role' => UserRoles::TEACHER->value,
            ]);

        $student->tasks()->attach($tasks);
        $teacher->tasks()->attach($tasks);
        $teacher->students()->attach($student);
    }
}
