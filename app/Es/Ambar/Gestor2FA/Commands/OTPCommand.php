<?php

namespace Es\Ambar\Gestor2FA\Commands;

use Illuminate\Support\Facades\Process;

/**
 * Class TwoFACommand
 * @package Es\Ambar\Gestor2FA\Commands
 *
 * This class is responsible for handling two-factor authentication commands.
 */
class OTPCommand
{
	public static function newOTP($code, $name): bool
	{
		return Process::command("2fa add {$name};")
			-> input($code)
			-> run()
			-> successful();
	}

	public static function getOTP($name)
	{
		$process = Process::run("2fa {$name};");

		return $process -> successful()
			?  $process -> output()
			: null;
	}

	public static function getAllOTP() {
		return Process::run("2fa") -> output();
	}
}
