<?php

use App\Http\Middleware\AzureTokenMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware(AzureTokenMiddleware::class) -> group(function () {
	Route::get("/2fa", []);

	Route::post("/2fa/add", []);

	Route::get("/2fa/{opt}",[]);

	Route::get("/azure/users", []);

// Ruta que añade usuarios a los grupos
	Route::post("/azure/users/add", []);

	Route::put("/azure/users/remove", []);
});
