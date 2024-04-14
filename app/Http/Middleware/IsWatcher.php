<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsWatcher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() and $request->user()->isWatcher()) {
            return $next($request);
        } else {
            return redirect('/')->withErrors([
                'status' => 'Вы не наблюдатель'
            ]);
        }
    }
}
