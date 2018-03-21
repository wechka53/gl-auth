<?php

namespace App\Providers;

use App\Interfaces\Services\Activation\ActivationServiceInterface;
use App\Interfaces\Services\Auth\AuthServiceInterface;
use App\Interfaces\Services\Mail\MailServiceInterface;
use App\Interfaces\Services\Queue\QueueServiceInterface;
use App\Interfaces\Services\User\UserServiceInterface;
use App\Services\Activation\ActivationService;
use App\Services\Auth\AuthService;
use App\Services\Mail\QueueMailService;
use App\Services\Queue\QueueService;
use App\Services\User\UserService;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
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
            $this->app->register(IdeHelperServiceProvider::class);
        }

        $this->app->bind(
            UserServiceInterface::class,
            UserService::class
        );
        $this->app->bind(
            MailServiceInterface::class,
            QueueMailService::class
        );
        $this->app->bind(
            QueueServiceInterface::class,
            QueueService::class
        );

        $this->app->bind(
            AuthServiceInterface::class,
            AuthService::class
        );

        $this->app->bind(
            ActivationServiceInterface::class,
            ActivationService::class
        );
    }
}
