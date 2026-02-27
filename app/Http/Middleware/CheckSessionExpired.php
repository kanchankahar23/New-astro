<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
class CheckSessionExpired
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // Check session lifetime

            if (!session()->has('last_activity_time')) {
                session()->put('last_activity_time', Carbon::now());

            }
            $maxLifetime = config('session.lifetime') * 60; // Convert session lifetime to seconds
            $lastActivity = session()->get('last_activity_time');

            // If last activity time is set and session has expired, logout user
            if ($lastActivity && (time() - $lastActivity > $maxLifetime)) {

                session()->flush(); // Clear session data
                DB::table('users')
                    ->where('id', Auth::id())
                    ->update(['active_status' => 0]);

            }
            // Update last activity time
            session()->put('last_activity_time', time());
        }
        return $next($request);

    }
}
