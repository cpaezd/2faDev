<?php

namespace Es\Ambar\Gestor2FA\Services;

use App\Http\Requests\EditOTPRequest;
use App\Http\Requests\NewOTPRequest;
use App\Models\AmbarOTP;
use Es\Ambar\Gestor2FA\Commands\OTPCommand;
use Es\Ambar\Gestor2FA\Services\Contracts\IOTPService;
use Es\Ambar\Gestor2FA\Repositories\Interfaces\IOTPRepository;
use Es\Ambar\Gestor2FA\Repositories\OTPRepository;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
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

	function newOTP(NewOTPRequest $request)
	{
		// Log::channel("otp") -> info("Empezando...");

		// $nuevo = new AmbarOTP([
		// 	"nombre" => $request -> nombre,
		// 	"grupoSoporte" => $request -> grupoSoporte,
		// 	"cliente" => $request -> cliente
		// ]);

		$nuevo = new AmbarOTP([$request -> all()]);

		// $creadoSVR = $this
		// 	-> optCommand
		// 	-> newOTP($nuevo -> codigo, $nuevo -> nombre);

		// if(!$creadoSVR) {
		// 	return response() -> json([
		// 		"message" => "Fallo al crear el OTP en el servidor"
		// 	], 500);
		// }

		// Log::channel("otp") -> info("Base de datos...");
		$creadoBD = $this
			-> otpRepository
			-> newOTP($nuevo);

		if(!$creadoBD) {
			// Log::channel("otp") -> info("Nah...");
			return response() -> json([
				"message" => "Fallo al insertar el OTP en la BD"
			], 500);
		}

		// Log::channel("otp") -> info("Bien!");
		return [
			"message" => "OTP creado correctamente",
			"data" => $creadoBD
		];
	}

	function getOTPCode(string $otpId)
	{
		// TODO: Implement getOTPCode() method.
	}

	function getOTPs()
	{
		return $this -> otpRepository -> getOTPs();
	}

	function getOTPsByGroups($user)
	{
		$entraID = new AzureGraphService();
		$groups = $entraID -> getGroups($user);

		return $this -> otpRepository -> getOTPsByGroups($user);
	}

	function editOTP(EditOTPRequest $request)
	{
		// TODO: Implement editOTP() method.
	}

	function disableOTP(string $otpId)
	{
		return $this -> otpRepository -> disableOTP($otpId);
	}
}
