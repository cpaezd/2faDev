<?php

namespace Es\Ambar\Gestor2FA\Repositories;

use App\Models\AmbarOTP;
use App\Models\AzureGroup;
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
		return AmbarOTP::with("azureGroups")
			-> whereIn("id", $groups)
			-> where("activo", true)
			-> flatten()
			-> get();
	}

	function disableOTP(AmbarOTP $otp)
	{
		$otp -> activo = false;

		return $otp -> save();
	}

	function editOTP(AmbarOTP $otp, $data)
	{
		$otp -> fill($data);

		return $otp -> save();
	}
}
