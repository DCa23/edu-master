<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskQuestion extends Model
{
    /** @use HasFactory<\Database\Factories\TaskQuestionFactory> */
    use HasFactory;

    protected $fillable = [
        'question',
        'answer',
        'task_id',
    ];

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }
}
