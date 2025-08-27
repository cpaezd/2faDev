<?php

namespace Es\Ambar\Gestor2FA\Services;

use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class AzureGraphService
{
	private string $tenantId;
	private string $clientId;
	private string $clientSecret;

	private const MICROSOFT_GRAPH_API = 'https://graph.microsoft.com/v1.0/';

	public function __construct()
	{
		$this -> tenantId = env('AZURE_TENANT_ID');
		$this -> clientId = env('AZURE_CLIENT_ID');
		$this -> clientSecret = env('AZURE_CLIENT_SECRET');
	}

	private function getAccessToken(): string
	{
		return Cache::remember('azure_access_token', now() -> addMinutes(55), function () {
			$response = Http::asForm()
				-> post(
					"https://login.microsoftonline.com/{$this->tenantId}/oauth2/v2.0/token",
					[
						'grant_type' => 'client_credentials',
						'client_id' => $this -> clientId,
						'client_secret' => $this -> clientSecret,
						'scope' => 'https://graph.microsoft.com/.default',
					]
				);

			if (!$response->successful()) {
				return null;
			}

			return $response->json()['access_token'];
		});
	}

	public function checkUser(string $accessToken): bool {
		$request = Http::withToken($accessToken)
			-> get("");

		return $request -> successful();
	}

	public function getGroups(string $accessToken, string $user)
	{

	}


}
