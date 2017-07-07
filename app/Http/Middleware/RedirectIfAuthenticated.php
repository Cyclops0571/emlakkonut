<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
<<<<<<< HEAD
            return redirect('/projects');
=======
            return redirect('/home');
>>>>>>> 5fb47b68a1fc55429bab6b28de8682134345b148
        }

        return $next($request);
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 5fb47b68a1fc55429bab6b28de8682134345b148
