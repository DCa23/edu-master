<?php

namespace App\Http\Controllers;

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
        // dd($request->user()->role);
        if ($request->user()->role == UserRoles::TEACHER->value) {
            return Inertia::render('Dashboards/Teacher');
        }

        return Inertia::render('Dashboards/Student');
    }
}
