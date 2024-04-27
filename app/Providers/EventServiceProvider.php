<?php

namespace App\Providers;

use App\Events\RegisterEvent;
use App\Listeners\SendEmailRegistrationListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

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

      \App\Events\RegisterEvent::class => [
          \App\Listeners\SendEmailRegistrationListener::class,
      ],
        \App\Events\LoginEvent::class => [
            \App\Listeners\SendEmailLoginListener::class,
        ],
        \App\Events\EmailVerificationCodeEvent::class => [
            \App\Listeners\SendEmailVerificationCodeListener::class,
            ],
        \App\Events\PasswordResetCodeEvent::class => [
            \App\Listeners\SendEmailPasswordResetCodeListener::class,
        ],
        \App\Events\PatientDataAddedEvent::class => [
            \App\Listeners\SendMailPatientDataAddedListener::class,
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
