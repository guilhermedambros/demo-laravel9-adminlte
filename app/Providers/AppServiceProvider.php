<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Pagination\Paginator;

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
        /*User::created(function ($user) {
            $role = Role::where('name', 'Operador')->first(); 
            $user->assignRole([$role->id]);
        }); */

        Paginator::useBootstrap();
    }
}
