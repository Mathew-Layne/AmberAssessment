<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->user_type == 'Student') {
            return redirect()->route('dashboard.student');
        }

        if (Auth::user()->user_type == 'Teacher') {
            return redirect()->route('dashboard.teacher');
        }

        if (Auth::user()->user_type == 'Admin') {
            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}
