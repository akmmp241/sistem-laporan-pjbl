<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Models\Supervisor;
use App\Models\Task;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class StudentAttendanceController extends Controller
{
    public function index(): View
    {
        $getTask = function () {
            return Task::query()
                ->join('students as s', 's.id', '=', 'tasks.student_id', 'left')
                ->where('s.supervisor_id', Auth::user()->supervisor->id);
        };

        $tasks = $getTask()->orderByDesc('tasks.id')->get();

        $getId = $getTask()->orderByDesc('tasks.id')->select('tasks.id')->get();

        $tasks->map(function (Task $task, int $key) use ($getId) {
            $task->id = $getId[$key]->id;
        });

        return view('supervisor.attendance', [
            'tasks' => $tasks
        ]);
    }
}
