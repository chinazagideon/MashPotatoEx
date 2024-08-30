<?php

namespace App\Http\Middleware;

use Closure;

class BotSubscriberMiddleware
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
        if ($request->user()->active_bot_trade)
            return $next($request);
        return redirect()->route('subscribe')->with('status', 'Subscribe to start auto trading.');
    }
}
