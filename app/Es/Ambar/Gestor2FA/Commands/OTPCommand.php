<?php

namespace Es\Ambar\Gestor2FA\Commands;

use Illuminate\Support\Facades\Process;

class OTPCommand
{
	public function newOTP($code, $name): bool
	{
		return Process::input("$code\n")
			-> run("2fa -add {$name};")
			-> successful();
	}

	public static function getOTPCode(string $name): string
	{
		$process = Process::run("2fa {$name}");

		return $process -> successful()
			?  $process -> output()
			: $process -> errorOutput();
	}

	public function getAllOTP() {
		return Process::run("2fa") -> output();
	}
}
