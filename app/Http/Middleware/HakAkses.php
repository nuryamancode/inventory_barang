<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HakAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $peranuser): Response
    {
        if (auth()->user()-> peran == $peranuser) {
            return $next($request);
        }
        else{
            return response()->json('Anda tidak memiliki akses');
        }
    }
}
