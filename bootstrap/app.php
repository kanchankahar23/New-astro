<?php

use App\Http\Middleware\UserActivity;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\Internal;
use App\Http\Middleware\Astrologer;
use App\Http\Middleware\User;
use App\Http\Middleware\CheckCategory;
use App\Http\Middleware\CheckSessionExpired;
use App\Http\Middleware\Cors;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        channels: __DIR__ . '/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'internal' => Internal::class,
            'astrologer' => Astrologer::class,
            'user' => User::class,
            'category' => CheckCategory::class,
            'useractivity' => UserActivity::class,
        ]);
        $middleware->append(CheckSessionExpired::class);
        $middleware->append(UserActivity::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
    })
    ->create();
