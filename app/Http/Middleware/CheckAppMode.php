<?php

namespace App\Http\Middleware;

use App\Models\Prop;
use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\PropController;

class CheckAppMode
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
        $prop = new Prop();
        if ($request->user() and ((int) $prop->getProp('app_mode') or $request->user()->isAdministrator())) {
            return $next($request);
        } else {
            return redirect('/')->withErrors([
                'status' => 'Действие недоступно'
            ]);
        }
    }
}
