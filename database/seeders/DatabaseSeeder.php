<?php

namespace Database\Seeders;

use App\Models\Enums\UserRoles;
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
        User::factory()
            ->has(User::factory(20), 'students')
            ->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'role' => UserRoles::TEACHER->value,
            ]);
    }
}
