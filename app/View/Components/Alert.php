<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public function __construct(
        public string $type = 'info',
        public ?string $message = null,
        public bool $permanent  = false
    ) {}

    public function render():  View|Closure|string
    {
        return view('components.alert');
    }
}
