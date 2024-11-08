<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAuthorized
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $routeUserId = $request->route('id'); // Get the 'id' parameter from the route

        // Check if the authenticated user is accessing their own settings
        if ($user && $user->id != $routeUserId) {
            return redirect()->route('settings.account-show', ['id' => $user->id]);
        }

        return $next($request);
    }
}

