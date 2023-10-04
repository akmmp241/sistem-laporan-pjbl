<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request): View
    {
        if ($request->url() === route('admin.login')) {
            return view('admin.login');
        }
        return view("login");
    }

    public function submit(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->role_id === User::$ADMIN) {
                return redirect(route('admin.dashboard'));
            }
            return redirect()->intended();
        }

        return redirect()->back()->withErrors([
            "error" => "username atau password salah"
        ]);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}
