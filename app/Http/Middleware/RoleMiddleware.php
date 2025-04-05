<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();

        switch ($role) {
            case 'admin':
                if (!$user->isAdmin()) {
                    return redirect()->route('home')->with('error', 'You do not have permission to access this page.');
                }
                break;
            case 'host':
                if (!$user->isHost()) {
                    return redirect()->route('home')->with('error', 'Only hosts can access this page.');
                }
                break;
            case 'traveler':
                if (!$user->isTraveler()) {
                    return redirect()->route('home')->with('error', 'Only travelers can access this page.');
                }
                break;
        }

        return $next($request);
    }
}
