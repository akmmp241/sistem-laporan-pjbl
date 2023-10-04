<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(): View
    {
        abort_if(Auth::user()->role_id !== User::$ADMIN, 403);
        return view('admin.home');
    }
}
