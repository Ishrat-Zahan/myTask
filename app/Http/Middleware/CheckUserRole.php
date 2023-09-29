<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
       
        Log::info("test:" . $role);
        dd($role);
        if (Auth::check()) {
            $userRole = auth()->user()->role;

            if ($userRole == $role) {
                if ($role == '1') {
                    return redirect()->route('dashboard');
                }
                return $next($request);
            }
        }

        return redirect()->route('home');
    }
}
