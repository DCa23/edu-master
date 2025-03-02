<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TaskSubmission extends Model
{
    /** @use HasFactory<\Database\Factories\TaskSubmissionFactory> */
    use HasFactory;

    protected $fillable = [
        'score',
        'task_id',
        'user_id',
    ];

    public function task(): HasOne
    {
        return $this->hasOne(Task::class);
    }

    public function student(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
