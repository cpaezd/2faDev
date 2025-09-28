<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditOTPRequest;
use App\Http\Requests\GetOTPsCodesRequest;
use App\Http\Requests\NewOTPRequest;
use Es\Ambar\Gestor2FA\Services\Contracts\IOTPService;
use Es\Ambar\Gestor2FA\Services\OTPService;
use Illuminate\Http\Request;

class OTPController extends Controller
{
	private IOTPService $otpService;

	public function __construct(IOTPService $otpService)
	{
		$this -> otpService = $otpService;
	}

	public function newOTP(NewOTPRequest $newTokenRequest)
	{
		return $this -> otpService -> newOTP($newTokenRequest);
	}

	public function getOTPs()
	{
		return $this -> otpService -> getOTPs();
	}

	public function getOTPCode(string $name)
	{
		return $this -> otpService -> getOTPCode($name);
	}

	public function getOTPsCode(GetOTPsCodesRequest $request)
	{
		return $this -> otpService -> getOTPsCode($request -> names);
	}

	public function getOTPsByGroup(string $user)
	{
		return $this -> otpService -> getOTPsByGroups($user);
	}

	public function editOTP(string $id, EditOTPRequest $editOTPRequest)
	{
		return $this -> otpService -> editOTP($id, $editOTPRequest);
	}

	public function disableOTP(string $otpId)
	{
		return $this -> otpService -> disableOTP($otpId);
	}
}
