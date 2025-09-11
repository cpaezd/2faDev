<?php

namespace Es\Ambar\Gestor2FA\Services\Contracts;

use App\Http\Requests\EditOTPRequest;
use App\Http\Requests\NewOTPRequest;
use Illuminate\Http\Request;

interface IOTPService
{
	function newOTP(NewOTPRequest $request);
	function getOTPCode(string $otpId);
	function getOTPs();
	function getOTPsByGroups($groups);
	function editOTP(string $id, EditOTPRequest $request);
	function disableOTP(string $otpId);
}
