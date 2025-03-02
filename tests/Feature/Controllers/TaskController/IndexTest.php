<?php

use App\Http\Resources\UserResource;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

it('Requires authentication ', function () {
get(route('tasks.index'))->assertRedirect(route('login'));
    });

it('Renders the task list component when the user is logged', function () {
    $user = User::factory()->create();

    actingAs($user)
        ->get(route('tasks.index'))
        ->assertComponent('Tasks/List');
});

it('It passes the user resource to the component', function () {
    $user = User::factory()->create();

    actingAs($user)
        ->get(route('tasks.index'))
        ->assertHasResource('user', UserResource::make($user));
});
