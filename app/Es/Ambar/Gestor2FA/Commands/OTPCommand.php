<?php

namespace Es\Ambar\Gestor2FA\Commands;

use Illuminate\Support\Facades\Process;

class OTPCommand
{
	public function newOTP($code, $name): bool
	{
		return Process::env(["PATH" => "/snap/bin/2fa"])
			-> input("$code\n")
			-> run("2fa -add {$name};")
			-> successful();
	}

	public static function getOTPCode(string $name): string
	{
		$process = Process::env(["PATH" => "/snap/bin/2fa"])
			-> run("2fa {$name}");

		return $process -> successful()
			?  $process -> output()
			: "XXXXXX";
	}

	public function getAllOTP() {
		return Process::env(["PATH" => "/snap/bin/2fa"])
			-> run("2fa")
			-> output();
	}
}
