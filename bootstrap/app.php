<?php

use App\Http\Middleware\Role;
use App\Http\Middleware\KuwagoRole;
use App\Http\Middleware\UddesignRole;
use Illuminate\Foundation\Application;
use App\Http\Middleware\EnsureUserIsAuthorized;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Auth\Middleware\Authenticate as AuthMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => Role::class,
            'auth' => AuthMiddleware::class,
            'kuwagoRole' => KuwagoRole::class,
            'uddesignRole' => UddesignRole::class,
            'redirectIfAuthenticated' => RedirectIfAuthenticated::class,
            'ensureUserIsAuthorized' => EnsureUserIsAuthorized::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
