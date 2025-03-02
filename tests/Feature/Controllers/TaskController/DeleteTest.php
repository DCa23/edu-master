<?php

use App\Models\Enums\UserRoles;
use App\Models\Task;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

it('Requires authentication ', function () {
    $task = Task::factory()->create();
    get(route('tasks.destroy', ['task' => $task]))->assertRedirect(route('login'));
});

it('Returns forbidden when a student tries to delete a task', function () {
    $user = User::factory()->create(['role' => UserRoles::STUDENT->value]);
    $task = Task::factory()->create();

    actingAs($user)
        ->delete(route('tasks.destroy', ['task' => $task]))
        ->assertForbidden();
});

it('Deletes the task when a teacher deletes the task', function () {
    $user = User::factory()->create(['role' => UserRoles::TEACHER->value]);
    $task = Task::factory()->create();

    actingAs($user)
        ->delete(route('tasks.destroy', ['task' => $task]))
        ->assertRedirect();

    $this->assertModelMissing($task);
});
