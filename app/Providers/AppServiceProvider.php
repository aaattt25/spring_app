<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 管理者のみアクセスできるようにする。ルーティングで使用
        Gate::define('admin', function ($user) {
            return ($user->role == 'administrator');
        });

        Inertia::share([
            'auth' => function () {
                return[
                    'user' => Auth::user() ? [
                        'id' => Auth::user()->id,
                        'name' => Auth::user()->name,
                        'role' => Auth::user()->role,
                    ] : null,
                ];
            },
        ]);
    }
}
