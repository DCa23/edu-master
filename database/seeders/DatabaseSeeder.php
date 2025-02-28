<?php

namespace Database\Seeders;

use App\Models\Enums\UserRoles;
use App\Models\Task;
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
        $tasks = Task::factory(10)->create();

        $student = User::factory()->recycle($tasks)->create([
            'name' => 'Test User',
            'email' => 'student@example.com',
            'role' => UserRoles::STUDENT->value,
        ]);

        $teacher = User::factory()
            ->has(User::factory(20)->recycle($tasks), 'students')
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
