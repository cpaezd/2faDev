<?php

namespace Es\Ambar\Gestor2FA\Repositories\Contracts;

use App\Http\Requests\NewOTPRequest;
use App\Models\AmbarOTP;

interface OTPContract2
{
	function newOTP(NewOTPRequest $newOTPRequest);
	function getAllOTP();
	function getTwoFA($name); // ??
	function getOTPsByGroups($id);
	function editOTP($otp);
}
