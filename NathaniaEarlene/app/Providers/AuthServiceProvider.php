<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //untuk mengelola product hanya dilakukan oleh admin
        Gate::define('manage-products', function ($user) {
            return $user->role === 'admin';
        });

        //untuk update product dapat dilakukan oleh admin dan sales
        Gate::define('update-product', function (User $user) {
            return $user->role === 'admin' || $user->role === 'sales';
        });

        //untuk menghapus product hanya dilakukan oleh admin
        Gate::define('delete-product', function (User $user) {
            return $user->role === 'admin';
        });

        //untuk membuat product dapat dilakukan oleh user yang sudah login
        Gate::define('create-product', function (User $user) {
            return $user !== null;
        });
    }
}
