<?php

namespace App\Http\Middleware;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{

    protected $addHttpCookie = true;

    protected $except = [
        'payment-status',
        '/ai-call-flow',
        '/ai-call-response',
    ];
}

