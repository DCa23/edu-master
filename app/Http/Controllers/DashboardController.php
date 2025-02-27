<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Http\Resources\TeacherResource;
use App\Models\Enums\UserRoles;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Welcome');
    }

    /**
     * Displays the dashboard page once you are logged in
     */
    public function show(Request $request): Response
    {
        if ($request->user()->role == UserRoles::TEACHER->value) {
            return Inertia::render('Dashboards/Teacher', [
                'teacher' => TeacherResource::make($request->user()->load('students')),
            ]);
        }

        return Inertia::render('Dashboards/Student', [
            'student' => StudentResource::make($request->user()->load('students')),
        ]);
    }
}
