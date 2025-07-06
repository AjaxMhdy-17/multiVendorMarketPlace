<?php

// get logged in user 

use Illuminate\Support\Facades\Auth;

if (!function_exists('user')) {
    function user()
    {
        return Auth::guard('web')->user();
    }
}
