<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Task;
use App\Models\TaskQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        Gate::authorize('viewAny', Task::class);
        // TO-DO load all tasks "manually" instead of throught the relationship in order to display the notes
        // $tasks = Task::with(['taskSubmissions' => function ($query) use ($user) {
        //     $query->where('user_id', $user->id);
        // }])->get();

        return Inertia('Tasks/List', [
            'user' => UserResource::make($request->user()->load('tasks')),
            'score' => session()->get('score'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        Gate::authorize('create', Task::class);

        return Inertia('Tasks/Form', [
            'user' => UserResource::make($request->user()->load('tasks')),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Task::class);

        $data = $request->validate([
            'title' => ['required', 'string'],
            'questions' => ['required', 'array'],
            'questions.*.question' => ['required', 'string'],
            'questions.*.answer' => ['required', 'string'],
        ]);

        $task = $request->user()->tasks()->create([
            'title' => $data['title'],
        ]);

        foreach ($data['questions'] as $question) {
            TaskQuestion::create([
                'question' => $question['question'],
                'answer' => $question['answer'],
                'task_id' => $task->id,
            ]);
        }

        return to_route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $task->load('task_questions');

        return Inertia('Tasks/Show', [
            'task' => $task,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
