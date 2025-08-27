<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewOTPRequest;
use Es\Ambar\Gestor2FA\Repositories\Contracts\OTPContract2;
use Illuminate\Http\Request;

class OTPController extends Controller
{
	private OTPContract2 $twoFAContract;

	public function __construct(OTPContract2 $twoFAContract)
	{
		$this -> twoFAContract = $twoFAContract;
	}

	public function getTwoFA()
	{
//		return $this -> twoFAContract -> getTwoFA();
	}

	public function newTwoFA(NewOTPRequest $newTokenRequest)
	{

	}
}
