<?php

use App\Http\Middleware\AzureTokenMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        api: __DIR__.'/../routes/api.php'
    )
    ->withMiddleware(function (Middleware $middleware) {
       // $middleware -> append(AzureTokenMiddleware::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // ssd
    })->create();
