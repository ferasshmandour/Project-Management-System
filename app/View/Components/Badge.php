<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Badge extends Component
{
    public $type;

    public function __construct($type = 'secondary')
    {
        $this->type = $type;
    }

    public function render(): View|Closure|string
    {
        return view('components.badge');
    }
}
