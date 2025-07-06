<?php

namespace Es\Ambar\Gestor2FA\Repositories\Contracts;

interface TwoFAContract
{
	function addTwoFA($code, $name);
	function getAllTwoFA();
	function getTwoFA($name);
}