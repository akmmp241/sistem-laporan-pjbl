<?php

namespace App\View\Components\Alert;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BadRequest extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $message,
        public int $key
    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert.bad-request');
    }
}
