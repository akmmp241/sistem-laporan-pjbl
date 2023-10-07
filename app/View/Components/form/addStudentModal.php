<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class addStudentModal extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Collection $dudis,
        public Collection $supervisors
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.add-student-modal');
    }
}
