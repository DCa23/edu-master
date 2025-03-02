<?php

use App\Models\Task;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

it('Requires authentication ', function () {
    $task = Task::factory()->create();
    get(route('tasks.show', ['task' => $task]))->assertRedirect(route('login'));
});

it('Renders the task show component when the user is logged', function () {
    $user = User::factory()->create();
    $task = Task::factory()->create();

    actingAs($user)
        ->get(route('tasks.show', ['task' => $task]))
        ->assertComponent('Tasks/Show');
});

// TO-DO: Uncomment this test when TaskResource created
// it('Passes the task resource to the component when the user is logged', function () {
//     $user = User::factory()->create();
//     $task = Task::factory()->create();

//     actingAs($user)
//         ->get(route('tasks.show', ['task' => $task]))
//         ->assertHasResource('task', $task);
// });
