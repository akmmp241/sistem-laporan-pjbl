<?php

namespace App\View\Components\form;

use App\Models\Student;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UpdateStudentModal extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public int $id)
    {
        $student = Student::query()->find($this->id);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.update-student-modal');
    }
}
