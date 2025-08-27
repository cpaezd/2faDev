<?php

namespace Es\Ambar\Gestor2FA\Repositories;

use Es\Ambar\Gestor2FA\Utils\ApiResponse;
use App\Http\Requests\NewOTPRequest;
use App\Models\AmbarOTP;
use Es\Ambar\Gestor2FA\Commands\OTPCommand;
use Es\Ambar\Gestor2FA\Repositories\Contracts\OTPContract2;
use Illuminate\Support\Facades\Http;


class OTPRepository2 implements OTPContract2
{
	use ApiResponse;

	public function newOTP(NewOTPRequest $newOTPRequest)
	{
		 $command = OTPCommand::newOTP(
			 $newOTPRequest -> code,
			 $newOTPRequest -> name
		 );

		 if(!$command) {
			 return $this -> error();
		 }

		 $token = new AmbarOTP();

		 $token -> nombre = $newOTPRequest -> nombre;
		 $token -> cliente = $newOTPRequest -> cliente;
		 $token -> grupoSoporte = $newOTPRequest -> grupoSoporte;

		 $token -> save();

		 return $this -> success();
	}

	public function getAllOTP()
	{
		return OTPCommand::getAllOTP();
	}

	public function getTwoFA($name)
	{
		return OTPCommand::getOTP($name);
	}

	function getOTPsByGroups($id)
	{
		// TODO: Implement getOTPsByGroup() method.
	}

	function editOTP($otp)
	{
		// TODO: Implement editOTP() method.
	}
}
