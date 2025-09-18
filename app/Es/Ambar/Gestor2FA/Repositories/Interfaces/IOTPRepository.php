<?php

namespace Es\Ambar\Gestor2FA\Repositories\Interfaces;

use App\Models\AmbarOTP;

interface IOTPRepository
{
	function newOTP(AmbarOTP $nuevo);
	function getOTPCode(string $otpId);
	function getOTP($id);
	function getOTPs();
	function getOTPsByGroups($groups);
	function editOTP(AmbarOTP $otp, $data);
	function disableOTP(AmbarOTP $otp);
}
