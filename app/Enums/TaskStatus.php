<?php

namespace App\Enums;

enum TaskStatus: string
{
    case Active = 'active';
    case Inactive = 'inactive';
    case Pending = 'pending';
    case InProgress = 'in-progress';
    case ToDo = 'todo';
    case Done = 'done';
}
