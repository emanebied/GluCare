<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

      \App\Events\Auth\RegisterEvent::class => [
          \App\Listeners\Auth\lRegistrationListener::class,
      ],
        \App\Events\Auth\LoginEvent::class => [
            \App\Listeners\Auth\LoginListener::class,
        ],
        \App\Events\Auth\EmailVerificationCodeEvent::class => [
            \App\Listeners\Auth\VerificationCodeListener::class,
            ],
        \App\Events\Auth\PasswordResetCodeEvent::class => [
            \App\Listeners\Auth\PasswordResetCodeListener::class,
        ],
        \App\Events\GluCare\Detection\PatientDataAddedEvent::class => [
            \App\Listeners\GluCare\Detection\PatientDataAddedListener::class,
        ],
 ];


    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
