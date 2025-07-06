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
	public static function addTwoFA($code, $name): bool
	{
		if(!$code) {
			return false;
		}

		if(!$name) {
			return false;
		}

		return Process::command("2fa add {$code};")
			-> input($code)
			-> run()
			-> successful();
	}

	public static function getTwoFA($name)
	{
		if(!$name) {
			return null;
		}

		return Process::run("2fa {$name};")
			-> successful() 
			? Process::output() 
			: null;
	}
}
