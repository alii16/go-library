<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsPustakawan
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role === 'pustakawan') {
            return $next($request);
        }

        abort(403, 'Akses hanya untuk pustakawan.');
    }
}