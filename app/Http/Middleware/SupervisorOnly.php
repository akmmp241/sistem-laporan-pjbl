<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SupervisorOnly
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
//        Check if logged user is supervisor?
        if (Auth::user()->role_id !== User::$SUPERVISOR) {
            return redirect()->intended();
        }
        return $next($request);
    }
}
