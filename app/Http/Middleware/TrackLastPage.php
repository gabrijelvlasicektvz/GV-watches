<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TrackLastPage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next)
    {
        // Popis ruta koje NE želimo spremiti kao zadnju posjećenu
        $excludedPaths = [
            'cart',
            'checkout',
            'login',
            'register',
        ];

        // Ako trenutna ruta NIJE u popisu isključenih, spremi je u sesiju
        if (!$request->is(...$excludedPaths)) {
            session(['last_shopped_url' => $request->fullUrl()]);
        }

        return $next($request);
    }
}
