<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddCacheHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Adiciona o cabeçalho de Cache-Control
        $response->headers->set('Cache-Control', 'max-age=60, must-revalidate');

        return $response;
    }
}

