<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Models\Supervisor;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupervisorHomeController extends Controller
{
    public function index(): View
    {
//        Siswa bimbingan
        $students = Auth::user()->supervisor->students;
        return view('supervisor.home', compact('students'));
    }
}
