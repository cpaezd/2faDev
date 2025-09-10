<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $injections = [
            \Es\Ambar\Gestor2FA\Services\Contracts\IOTPService::class => \Es\Ambar\Gestor2FA\Services\OTPService::class,
            \Es\Ambar\Gestor2FA\Repositories\Interfaces\IOTPRepository::class => \Es\Ambar\Gestor2FA\Repositories\OTPRepository::class
        ];

        foreach($injections as $interface => $implementation) {
            $this -> app -> bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
