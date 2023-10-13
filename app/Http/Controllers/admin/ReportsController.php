<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index(): View
    {
        $tasks = Task::all();
        return view('admin.report', compact('tasks'));
    }
}
