<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditOTPRequest;
use App\Http\Requests\NewOTPRequest;
use Es\Ambar\Gestor2FA\Services\Contracts\IOTPService;
use Es\Ambar\Gestor2FA\Services\OTPService;

class OTPController extends Controller
{
	private IOTpService $otpService;

	public function __construct()
	{
		$this -> otpService = new OTPService();
	}

	public function newOTP(NewOTPRequest $newTokenRequest)
	{
		return $this -> otpService -> newOTP($newTokenRequest);
	}

	public function getOTPs()
	{
		return $this -> otpService -> getOTPs();
	}

	public function getOTPCode(string $otpId)
	{
		return $this -> otpService -> getOTPCode($otpId);
	}

	public function getOTPsByGroup(string $user)
	{
		return $this -> otpService -> getOTPsByGroups($user);
	}

	public function editOTP(EditOTPRequest $editOTPRequest)
	{
		return $this -> otpService -> editOTP($editOTPRequest);
	}

	public function disableOTP(string $otpId)
	{
		return $this -> otpService -> disableOTP($otpId);
	}
}
