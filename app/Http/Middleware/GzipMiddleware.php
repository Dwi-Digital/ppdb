<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GzipMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if ($response instanceof Response && $response->headers->get('Content-Encoding') !== 'gzip') {
            $response->header('Content-Encoding', 'gzip');
            $response->header('Vary', 'Accept-Encoding');
            $response->setContent(gzencode($response->getContent(), 6, FORCE_GZIP));
        }

        return $response;
    }
}
