<?php

namespace App\Models;

use App\Models\Enums\UserRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    protected $with = ['teachers', 'task_submission'];

    protected $fillable = [
        'title',
    ];

    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'task_user', 'task_id', 'user_id');
    }

    public function teachers(): BelongsToMany
    {
        return $this->users()->where('role', '=', UserRoles::TEACHER->value);
    }

    public function students(): BelongsToMany
    {
        return $this->users()->where('role', '=', UserRoles::STUDENT->value);
    }

    public function task_questions(): HasMany
    {
        return $this->hasMany(TaskQuestion::class);
    }

    public function task_submission(): BelongsTo
    {
        return $this->belongsTo(TaskSubmission::class);
    }
}
