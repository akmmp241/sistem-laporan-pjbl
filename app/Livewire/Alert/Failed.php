<?php

namespace App\Livewire\Alert;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Failed extends Component
{
    public string $message;
    public int $key = 1;

    public function flushSession(): void
    {
        request()->session()->remove('failed');
    }

    public function render(): View
    {
        return view('livewire.alert.failed');
    }
}
