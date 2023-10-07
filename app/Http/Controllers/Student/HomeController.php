<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReportCollection;
use App\Models\Report;
use App\Models\Student;
use App\Models\Task;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(): View
    {
        $activities = Task::query()
            ->where('student_id', Auth::user()->student->id)
            ->orderByDesc('date')
            ->limit(3)
            ->get();

        return view('student.home', [
            "user" => Auth::user(),
            "activities" => new ReportCollection($activities),
        ]);
    }
}
