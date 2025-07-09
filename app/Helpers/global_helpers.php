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



if (!function_exists('admin')) {
    function admin()
    {
        return Auth::guard('admin')->user();
    }
}

if (!function_exists('pendingKycCount')) {
    function pendingKycCount()
    {
        return KycVerification::where('status', 'pending')->count();
    }
}


if (!function_exists('isAuthor')) {
    function isAuthor()
    {
        return user()->user_type == 'author' && user()->kyc_status == 1;
    }
}

if (!function_exists('canAccess')) {
    function canAccess(array $permissions): bool
    {
        $permission = auth()->guard('admin')->user()->hasAnyPermission($permissions);
        $superAdmin = auth()->guard('admin')->user()->hasRole('super admin');

        if ($permission || $superAdmin) {
            return true;
        }
        return false;
    }
}


if (!function_exists('isSuperAdmin')) {
    function isSuperAdmin()
    {
        if (auth()->guard('admin')->user()->name == 'Super Admin') {
            return true;
        }
        return false;
    }
}
