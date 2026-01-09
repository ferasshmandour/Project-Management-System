<?php

namespace App\Enums;

enum TaskStatus: string
{
    case Active = 'active';
    case Pending = 'pending';
    case InProgress = 'in progress';
    case ToDo = 'todo';
    case Done = 'done';
}
