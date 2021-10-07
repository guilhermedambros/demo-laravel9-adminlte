<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\ResetPassword;

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
		
		VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->subject(env('APP_NAME').' - Verificação de e-mail')
                ->markdown('emails.verify', ['url' => $url]);
        });
		
		ResetPassword::toMailUsing(function ($notifiable, $token) {
            $url = url(route('password.reset', [
                'token' => $token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false));
            return (new MailMessage)
                ->subject(env('APP_NAME').' - Gerar nova senha')
                ->markdown('emails.reset_password', ['url' => $url]);
        });
    }
}
