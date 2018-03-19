<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        $this->app->bind(
            \App\Interfaces\Services\User\UserServiceInterface::class,
            \App\Services\User\UserService::class
        );
        $this->app->bind(
            \App\Interfaces\Services\Mail\MailServiceInterface::class,
            \App\Services\Mail\QueueMailService::class
        );
        $this->app->bind(
            \App\Interfaces\Services\Queue\QueueServiceInterface::class,
            \App\Services\Queue\QueueService::class
        );

        $this->app->bind(
            \App\Interfaces\Services\Auth\AuthServiceInterface::class,
            \App\Services\Auth\AuthService::class
        );

        $this->app->bind(
            \App\Interfaces\Services\Activation\ActivationServiceInterface::class,
            \App\Services\Activation\ActivationService::class
        );
    }
}
