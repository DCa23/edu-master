<?php

use App\Models\Enums\UserRoles;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

it('Requires authentication ', function () {
get(route('dashboard'))->assertRedirect(route('login'));
    });

it('Renders the student dashboard component when role is student', function () {
    $user = User::factory()->create();
    actingAs($user)
        ->get(route('dashboard'))
        ->assertComponent('Dashboards/Student');
});

it('Renders the student dashboard component when role is non established', function () {
    $user = User::factory()->create(['role' => 'fakerole']);
    actingAs($user)
        ->get(route('dashboard'))
        ->assertComponent('Dashboards/Student');
});

it('Renders the teacher dashboard component when role is teacher', function () {
    $user = User::factory()->create(['role' => UserRoles::TEACHER->value]);

    actingAs($user)
        ->get(route('dashboard'))
        ->assertComponent('Dashboards/Teacher');
});
