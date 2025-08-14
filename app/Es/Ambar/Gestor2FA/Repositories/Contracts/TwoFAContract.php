<?php

namespace Es\Ambar\Gestor2FA\Repositories\Contracts;

use App\Http\Requests\NewTokenRequest;
use App\Models\TwoFaToken;

interface TwoFAContract
{
	function addTwoFA(NewTokenRequest $newTokenRequest);
	function getAllTwoFA();
	function getTwoFA($name);
}
