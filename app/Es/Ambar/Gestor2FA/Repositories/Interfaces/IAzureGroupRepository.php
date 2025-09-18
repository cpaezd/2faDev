<?php

namespace Es\Ambar\Gestor2FA\Repositories\Interfaces;

interface IAzureGroupRepository
{
	function getUserGroups(string $userId);
}