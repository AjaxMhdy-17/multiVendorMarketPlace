<?php

namespace App\Http\Middleware;

use App\Models\KycSetting;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KycMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $kycSetting = KycSetting::first();
        if ($kycSetting->status == 0) {
            return redirect()->route('home.index');
        }
        if (user()->kyc != null && (user()->kyc->status == 'pending' || user()->kyc->status == 'approved')) {
            return redirect()->route('home.index');
        }
        return $next($request);
    }
}
