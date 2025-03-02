<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskSubmission;
use Illuminate\Http\Request;

class TaskSubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'task_id' => ['required', 'int'],
            'answers' => ['required', 'array'],
            'answers.*' => ['string'],
        ]);

        $task = Task::find($data['task_id']);

        $totalAnswers = count($data['answers']);
        $correctAnswers = 0;
        for ($i = 0; $i < $totalAnswers; $i++) {
            if ($data['answers'][$i] === $task->task_questions[$i]->answer) {
                $correctAnswers += 1;
            }
        }

        $score = round($correctAnswers / $totalAnswers * 10, 1);

        TaskSubmission::create([
            'score' => $score,
            'task_id' => $task->id,
            'user_id' => $request->user()->id,
        ]);

        return redirect()->route('tasks.index')->with('score', $score);
    }

    /**
     * Display the specified resource.
     */
    public function show(TaskSubmission $taskSubmission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskSubmission $taskSubmission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TaskSubmission $taskSubmission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskSubmission $taskSubmission)
    {
        //
    }
}
