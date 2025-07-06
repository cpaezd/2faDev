<?php

namespace Es\Ambar\Gestor2FA\Repositories\Contracts;

interface TwoFAContract
{
	function addTwoFA($code);
	function getAllTwoFA();
	function getTwoFA($name);
}