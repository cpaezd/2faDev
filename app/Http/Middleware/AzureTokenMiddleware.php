<?php

namespace App\Http\Middleware;

use Closure;
use Es\Ambar\Gestor2FA\Services\AzureGraphService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class AzureTokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
		if(!($token = $request -> bearerToken()))
		{
			return response() -> json(["errorMsg" => "No se ha proporcionado un token"], 403);
		}

		$ags = new AzureGraphService();

		if(!$ags -> checkUser($token))
		{
			return response() -> json(["errorMsg" => "El token proporcionado no es válido"], 403);
		}

        return $next($request);
    }
}
