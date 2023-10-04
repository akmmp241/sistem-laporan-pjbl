<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index(): View
    {
        $student = User::query()->where('id', Auth::user()->id)->first();
        return view('student.profile', [
            'student' => $student
        ]);
    }
}
