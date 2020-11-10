<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckWarga
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
        if ($request->user()['is_admin'] == 0) {
            return $next($request);
        }
        return redirect('home');
    }
}
