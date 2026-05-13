<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CekAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {

        if (auth()->check() && auth()->user()->role == 'admin') {
            return $next($request);
        }

        return redirect('/dashboard')->with('error', 'Maaf, hanya Admin yang boleh akses halaman ini.');
    }
}
