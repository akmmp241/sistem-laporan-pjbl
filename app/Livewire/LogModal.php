<?php

namespace App\Livewire;

use App\Http\Resources\LogResource;
use App\Models\Report;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class LogModal extends Component
{
    public function render(): View
    {
        $log = Report::query()->find(request('id', 1));

        return view('livewire.log-modal', [
            'log' => $log
        ]);
    }
}
