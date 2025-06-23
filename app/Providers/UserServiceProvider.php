<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{


    public function boot()
    {
        View::composer("user.*", function ($view) {
            $view->with('user', Auth::guard('web')->user());
        });
    }
}
