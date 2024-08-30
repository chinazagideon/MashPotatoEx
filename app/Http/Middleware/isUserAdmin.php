<?php

namespace App\Http\Middleware;

use Closure;

class isUserAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()->is_admin) {
            return $next($request);
        }
        return redirect()->route('dashboard')->with('status', 'Unable to process request');
    }
}
