<?php

namespace Es\Ambar\Gestor2FA\Commands;

use Illuminate\Support\Facades\Process;

/**
 * Class TwoFACommand
 * @package Es\Ambar\Gestor2FA\Commands
 *
 * This class is responsible for handling two-factor authentication commands.
 */
class TwoFACommand
{
	public function addTwoFA($code): bool
	{
		if(!$code) {
			return false;
		}

		return Process::run("2fa add {$code}") -> successful();
	}


	public function getAllTwoFA()
	{
		
	}

	public function getTwoFA($name)
	{
			
	}
}
