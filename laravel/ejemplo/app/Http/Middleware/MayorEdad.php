<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MayorEdad
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $edad, $nombre): Response
    {
        if ($request->route('edad') < $edad && $request->route('nombre') == $nombre) {
            return redirect()->route('frutas');
        }
        return $next($request);
    }
}
