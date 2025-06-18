<?php

namespace App\View\Components\Widgets;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Stats extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $color = 'info',
        public ?string $title = null,
        public ?string $qnt = null,
        public ?string $icon = null
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.widgets.stats');
    }
}
