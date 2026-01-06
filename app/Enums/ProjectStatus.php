<?php

namespace App\Enums;

enum ProjectStatus: string
{
    case New = 'new';
    case Active = 'active';
    case Inactive = 'inactive';
    case Pending = 'panding';
    case Completed = 'completed';
}
