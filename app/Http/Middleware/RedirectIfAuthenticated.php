<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            // Redirect logged-in users to their respective dashboard or home page
            // return redirect('/home'); // Adjust the path as needed
            switch ($request->user()->role) {
                case 'owner':
                    return redirect('/kuwago-one');
                case 'general':
                    return redirect('/kuwago-one');
                case 'kuwago':
                    return redirect('/kuwago-one');
                case 'uddesign':
                    return redirect('/uddesign');
                default:
                    return redirect('/home');
            }
            
        }

        return $next($request);
    }
}



