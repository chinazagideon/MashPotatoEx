<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Auth\LoginController;
use App\User;
use Closure;

class AccountBlocked
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
        if($request->user()->status === User::USER_BLOCKED)
        {
            $login = new LoginController();
            $login->logout($request);

            return redirect()->route('login')->with('status2', 'Your account have been suspended, contact our support.');
        }
        return $next($request);
    }
}
