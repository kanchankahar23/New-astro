<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkCategory
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->type == 'internal') {
            return redirect()->route('admin/dashboard');
        } elseif ($request->user()->type == 'user') {
            return redirect()->route('user');
        } elseif ($request->user()->type == 'astrologer') {
            return redirect()->route('astrologer');
        }

        // Handle other categories or unauthorized access here

        return $next($request);
    }
}
