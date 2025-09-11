<?php

namespace Es\Ambar\Gestor2FA\Commands;

use Illuminate\Support\Facades\Process;

class OTPCommand
{
	public function newOTP($code, $name): bool
	{
		return Process::run("2fa add {$name};", function($proc) {
			$proc -> input("$code\n");
		})
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
