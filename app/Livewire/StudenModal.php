<?php

namespace App\Livewire;

use App\Models\Task;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StudenModal extends Component
{
    public function render(): View
    {
        return view('livewire.studen-modal');
    }
}
