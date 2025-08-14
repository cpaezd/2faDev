<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewTokenRequest;
use Es\Ambar\Gestor2FA\Repositories\Contracts\TwoFAContract;
use Illuminate\Http\Request;

class TwoFaController extends Controller
{
	private TwoFAContract $twoFAContract;

	public function __construct(TwoFAContract $twoFAContract)
	{
		$this -> twoFAContract = $twoFAContract;
	}

//	public function getTwoFA()
//	{
//		return $this -> twoFAContract ->getTwoFA();
//	}

	public function newTwoFA(NewTokenRequest $newTokenRequest)
	{

	}
}
