<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\Task;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index(): View
    {
        $logs = Task::query()
            ->where('student_id', Auth::user()->student->id)
            ->orderByDesc('id')
            ->get();
        return view('student.log', [
            'logs' => $logs
        ]);
    }
}
