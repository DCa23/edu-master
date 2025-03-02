<?php

namespace App\Http\Resources;

use App\Models\Enums\UserRoles;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'role' => $this->role,
            'teachers' => $this->whenLoaded('teachers', fn () => $this->teachers),
            'students' => $this->whenLoaded('students', fn () => $this->students),
            'tasks' => $this->whenLoaded('tasks', fn () => TaskResource::collection($this->tasks)),
            'can' => [
                'add_tasks' => UserRoles::TEACHER->value === $this->role,
                'edit_tasks' => UserRoles::TEACHER->value === $this->role,
                'delete_tasks' => UserRoles::TEACHER->value === $this->role,
                'answer_tasks' => UserRoles::STUDENT->value === $this->role,
            ],
        ];
    }
}
