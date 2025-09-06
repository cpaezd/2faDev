<?php

use App\Http\Controllers\OTPController;
use App\Http\Middleware\AzureTokenMiddleware;
use Illuminate\Support\Facades\Route;

Route::get("/test", function () {
	return "OK!";
});

Route::middleware(AzureTokenMiddleware::class) -> group(function () {
	Route::get("/opt/all", [OTPController::class, "newOTP"]);

	Route::post("/opt/add", [OTPController::class, "getOTPs"]);

	Route::get("/opt/code/{otpId}",[OTPController::class, "getOTPCode"]);

	Route::get("/opt/user/", [OTPController::class, "getOTPsByGroup"]);

	Route::patch("/opt/edit/{otpId}", [OTPController::class, "editOTP"]);

	Route::patch("/opt/disable/{otpId}", [OTPController::class, "disableOTP"]);
});
