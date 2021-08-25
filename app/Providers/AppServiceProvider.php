<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        /**Set default role */
        User::created(function ($user) {
            $role = Role::where('name', 'Operador')->first(); 
            $user->assignRole([$role->id]);
        });
    }
}
