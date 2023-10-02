<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();
        $activities = Report::query()->where('user_id', $user->id);
        return view('home', [
            "user" => $user,
            "activities" => $activities,
        ]);
    }
}
