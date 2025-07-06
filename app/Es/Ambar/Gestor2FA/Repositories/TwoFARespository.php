<?php

namespace Es\Ambar\Gestor2FA\Repositories;

use Es\Ambar\Gestor2FA\Commands\TwoFACommand;
use Es\Ambar\Gestor2FA\Repositories\Contracts\TwoFAContract;


class TwoFARepository implements TwoFAContract
{
	public function addTwoFA($code, $name)
	{
		if (!$code) {
			return false;
		}

		if (!$name) {
			return false;
		}

		if(!TwoFACommand::addTwoFA($code, $name)) {
			return false;
		}

		

		return true;
	}

	public function getAllTwoFA()
	{
		// TODO: Implement getAllTwoFA() method.
	}

	public function getTwoFA($id)
	{
		// TODO: Implement getTwoFA() method.
	}
}