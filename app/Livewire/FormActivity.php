<?php

namespace App\Livewire;

use App\Models\Dudi;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class FormActivity extends Component
{
    public string $type;

    public function render(): View
    {
        $dudis = Dudi::all();

        return view('livewire.form-activity', [
            "dudis" => $dudis
        ]);
    }
}
