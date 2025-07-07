<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KycMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (user()->kyc->status == 'pending' || user()->kyc->status == 'approved') {
            return redirect()->route('home.index');
        }
        return $next($request);
    }
}
