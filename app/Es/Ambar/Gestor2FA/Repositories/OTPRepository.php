<?php

namespace Es\Ambar\Gestor2FA\Repositories;

use App\Models\AmbarOTP;
use Es\Ambar\Gestor2FA\Commands\OTPCommand;
use Es\Ambar\Gestor2FA\Repositories\Interfaces\IOTPRepository;
use Illuminate\Database\Eloquent\Collection;

class OTPRepository implements IOTPRepository
{
	private OTPCommand $command;

	public function __construct()
	{
		$this -> command = new OTPCommand();
	}

	function newOTP(AmbarOTP $nuevo) : bool
	{
		return $nuevo -> save();
	}

	function getOTPCode(string $otpId)
	{
		// TODO: Implement getOTPCode() method.
	}

	function getOTPs(): Collection
	{
		return AmbarOTP::all();
	}

	function getOTPsByGroups($groups)
	{
		return AmbarOTP::whereIn('groups', $groups) -> get();
	}

	function disableOTP(string $otpId)
	{
		$otp = AmbarOTP::find($otpId);
	}
}
