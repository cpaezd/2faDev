<?php

namespace App\Es\Ambar\Gestor2FA\Utils;

trait ApiResponse
{
	const SUCCESS_MSG = "";
	const ERROR_CODE = "";
	const UNAUTHORIZED_CODE = "";
	const SERVER_ERROR = "El código introducido no es de Base64";

	public function success()
	{
		return response() -> json();
	}

	public function successData($data, $msg)
	{
		return response() -> json([...$data, $msg]);
	}

	public function error()
	{
		return response() -> json(["msg" => self::SERVER_ERROR], self::ERROR_CODE);
	}

	public function unauthorized()
	{

	}

	public function serverError()
	{

	}
}
