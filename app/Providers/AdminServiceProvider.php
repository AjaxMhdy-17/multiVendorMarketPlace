<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        View::composer("admin.*", function ($view) {
            $view->with('admin', Auth::guard('admin')->user());
        });
    }
}
