<?php

namespace Es\Ambar\Gestor2FA\Services;

use App\Http\Requests\EditOTPRequest;
use App\Http\Requests\NewOTPRequest;
use App\Models\AmbarOTP;
use Es\Ambar\Gestor2FA\Commands\OTPCommand;
use Es\Ambar\Gestor2FA\Services\Contracts\IOTPService;
use Es\Ambar\Gestor2FA\Repositories\Interfaces\IOTPRepository;
use Illuminate\Support\Facades\Log;

class OTPService implements IOTPService
{
	private IOTPRepository $otpRepository;
	private OTPCommand $optCommand;

	public function __construct(IOTPRepository $otpRepository, OTPCommand $otpCommand)
	{
		$this -> otpRepository = $otpRepository;
		$this -> optCommand = $otpCommand;
	}

	function newOTP(NewOTPRequest $notpr)
	{
		$nuevo = new AmbarOTP([
			"nombre" => $notpr -> nombre,
			"grupoSoporte" => $notpr -> grupoSoporte,
			"cliente" => $notpr -> cliente
		]);

		$creadoSVR = $this
			-> optCommand
		 	-> newOTP($notpr -> codigo, $nuevo -> nombre);

		if(!$creadoSVR) {
			return response() -> json([
				"message" => "Fallo al crear el OTP en el servidor"
			], 500);
		}

		$creadoBD = $this
			-> otpRepository
			-> newOTP($nuevo);

		if(!$creadoBD) {
			return response() -> json([
				"message" => "Fallo al insertar el OTP en la BD"
			], 500);
		}

		return [
			"message" => "OTP creado correctamente",
			"data" => $creadoBD
		];
	}

	function getOTPsCode(array $names)
	{
		$codes = [];

		foreach($names as $name) {
			$code = $this -> optCommand -> getOTPCode($name);

			$codes[$name] = trim($code);
		}

		return [...$codes, ...$names];
	}

	function getOTPs()
	{
		return $this -> otpRepository -> getOTPs();
	}

	function getOTPsByGroups($user)
	{
		$entraID = new AzureGraphService();
		$groups = $entraID -> getGroups($user);

		return $this -> otpRepository -> getOTPsByGroups($groups);
	}

	function editOTP(string $id, EditOTPRequest $request)
	{
		if(!$id) {
			return response() -> json([
				"message" => "No se ha indicado un ID de OTP válido"
			], 400);
		}

		$otp = $this -> otpRepository -> getOTP($id);

		if(!$otp) {
			return response() -> json([
				"message" => "No se ha encontrado el OTP"
			], 404);
		}

		$res = $this -> otpRepository -> editOTP($otp -> id, $request -> all());

		return response() -> json([
			"message" =>
				$res ? "OTP con id $id editado" : "Fallo al editar el otp"
		], $res ? 200: 500);
	}

	function disableOTP(string $id)
	{
		if(!$id) {
			return response() -> json([
				"message" => "No se ha indicado un ID de OTP válido"
			], 400);
		}

		$otp = $this -> otpRepository -> getOTP($id);

		if(!$otp) {
			return response() -> json([
				"message" => "No se ha encontrado el OTP"
			], 404);
		}

		return $this -> otpRepository -> disableOTP($id);
	}
}
