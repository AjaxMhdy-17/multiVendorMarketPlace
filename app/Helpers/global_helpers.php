<?php

// get logged in user 

use App\Models\KycVerification;
use Illuminate\Support\Facades\Auth;

if (!function_exists('user')) {
    function user()
    {
        return Auth::guard('web')->user();
    }
}

if (!function_exists('pendingKycCount')) {
    function pendingKycCount()
    {
        return KycVerification::where('status', 'pending')->count();
    }
}
