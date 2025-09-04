<?php

namespace Es\Ambar\Gestor2FA\Repositories\Interfaces;

use App\Models\AmbarOTP;

interface IOTPRepository
{
	function newOTP(AmbarOTP $nuevo);
	function getOTPCode(string $otpId);
	function getOTPs();
	function getOTPsByGroups($groups);
	function disableOTP(string $otpId);
}
