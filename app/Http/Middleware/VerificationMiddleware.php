<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class VerificationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->user()->verify_stage == User::VERIFIED) {
            return $next($request);
        }
        return redirect()->route('upload_page')->with('status2', 'Account Verification required to view page.');
    }
}
