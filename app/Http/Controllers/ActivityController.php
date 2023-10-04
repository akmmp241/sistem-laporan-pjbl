<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTaskRequest;
use App\Models\Report;
use App\Models\Task;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    public function index(Request $request): View
    {
        $type = $request->url() === route('checkin') ? "masuk" : "keluar";

        return view('student.activity', ["type" => $type]);
    }

    public function submit(AddTaskRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['image'] = $request->file('image')->store('images');
        $data['dudi_id'] = $data['dudi'];

        $task = Task::query()->create($data);

        $type = $request->url() === route('checkin') ? "masuk" : "keluar";

        $report = [
            'task_id' => $task->id,
            'user_id' => Auth::user()->id,
            'type' => $type,
            'date' => $data['date']
        ];

        $task->report()->create($report);

        return redirect(route('home'))->with([
            "message" => "suskses menambah laporan"
        ]);
    }
}
