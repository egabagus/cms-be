<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;

class Cors
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if ($response instanceof BinaryFileResponse) {
            return $response;
        }

        // Jika response bukan Response, buat instance baru
        if (!($response instanceof Response)) {
            $response = new Response($response->getContent(), $response->getStatusCode(), $response->headers->all());
        }

        // Atur header CORS
        $allowedOrigin = 'http://fe.egabagus.test:3000'; // Ganti dengan domain frontend-mu
        $response->headers->set('Access-Control-Allow-Origin', $allowedOrigin);
        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With');
        $response->headers->set('Access-Control-Allow-Credentials', 'true'); // ✅ Wajib untuk credentials

        return $response;
    }
}
