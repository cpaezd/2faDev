<?php

namespace Es\Ambar\Gestor2FA\Repositories;

use App\Models\AmbarOTP;
use Es\Ambar\Gestor2FA\Commands\OTPCommand;
use Es\Ambar\Gestor2FA\Repositories\Interfaces\IOTPRepository;
use Illuminate\Database\Eloquent\Collection;

class OTPRepository implements IOTPRepository
{
	function newOTP(AmbarOTP $nuevo) : bool
	{
		return $nuevo -> save();
	}

	function getOTPCode(string $otpId)
	{
		// TODO: Implement getOTPCode() method.
	}

	function getOTP($id)
	{
		return AmbarOTP::find($id);
	}

	function getOTPs(): Collection
	{
		return AmbarOTP::all();
	}

	function getOTPsByGroups($groups)
	{
		return AmbarOTP::whereIn('groups', $groups) -> get();
	}

	function disableOTP(string $id)
	{
		$otp = AmbarOTP::find($id)[0];

		$otp -> activo = false;

		return $otp -> save();
	}

	function editOTP($id, $data)
	{
		$otp = AmbarOTP::find($id)[0];

		$otp -> fill($data);

		return $otp -> save();
	}
}
