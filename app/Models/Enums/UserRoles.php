<?php

namespace App\Models\Enums;

enum UserRoles: string
{
    case TEACHER = 'teacher';
    case STUDENT = 'student';
}
