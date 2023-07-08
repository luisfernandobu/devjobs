<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Support\HtmlString;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function($notifiable, $url) {
            return (new MailMessage)
                ->subject('Confirmar Cuenta')
                ->greeting("Hola {$notifiable->name}!")
                ->line('Tu cuenta ya está casi lista, presiona el enlace a continuación para verificar tu email de registro.')
                ->action('Verificar Email', $url)
                ->line('Si no creaste esta cuenta, favor de ignorar este mensaje.')
                ->salutation(new HtmlString("Saludos." .'<br>' .'<strong>'. "Equipo DevJobs" . '</strong>'));
        });
    }
}
