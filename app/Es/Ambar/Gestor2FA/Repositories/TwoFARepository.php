<?php

namespace Es\Ambar\Gestor2FA\Repositories;

use App\Es\Ambar\Gestor2FA\Repositories\Repository;
use App\Es\Ambar\Gestor2FA\Utils\ApiResponse;
use App\Http\Requests\NewTokenRequest;
use App\Models\TwoFaToken;
use Es\Ambar\Gestor2FA\Commands\TwoFACommand;
use Es\Ambar\Gestor2FA\Repositories\Contracts\TwoFAContract;


class TwoFARepository implements TwoFAContract
{
	use ApiResponse;

	public function addTwoFA(NewTokenRequest $newTokenRequest)
	{
		 $command = TwoFACommand::addTwoFA(
			 $newTokenRequest -> code,
			 $newTokenRequest -> name
		 );

		 if(!$command) {
			 return $this -> error();
		 }

		 $token = new TwoFAToken();

		 $token -> nombre = $newTokenRequest -> nombre;
		 $token -> cliente = $newTokenRequest -> cliente;
		 $token -> grupoSoporte = $newTokenRequest -> grupoSoporte;

		 $token -> save();

		 return $this -> success();
	}

	public function getAllTwoFA()
	{
		return TwoFACommand::getAllTwoFA();
	}

	public function getTwoFA($name)
	{
		return TwoFACommand::getTwoFA($name);
	}
}
