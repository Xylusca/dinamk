<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormInput extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $label,
        public ?string $formText = null,
        public string $type = 'text',
        public ?string $value = null,
        public bool $required = false
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-input');
    }
}
