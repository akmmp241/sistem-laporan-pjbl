<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index(): View
    {
        $student = Auth::user()->student;
        return view('student.profile', [
            'student' => $student
        ]);
    }
}
