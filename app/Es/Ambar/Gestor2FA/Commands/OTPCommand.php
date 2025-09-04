<?php

namespace Es\Ambar\Gestor2FA\Commands;

use Illuminate\Support\Facades\Process;

class OTPCommand
{
	public function newOTP($code, $name): bool
	{
		return Process::command("2fa add {$name};")
			-> input($code)
			-> run()
			-> successful();
	}

	public static function getOTP($name): string
	{
		$process = Process::run("2fa {$name};");

		return $process -> successful()
			?  $process -> output()
			: $process -> errorOutput();
	}

	public function getAllOTP() {
		return Process::run("2fa") -> output();
	}
}
