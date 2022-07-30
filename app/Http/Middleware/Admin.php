<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Admin
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
        if (Auth()->user()) {
            if (Auth()->user()->profile->profile != 'admin') {
                return redirect()->route('home')->with([
                    "notification" => "Vous n'etes pas autorisé à acceder à cette page",
                ]);
            } else
                return abort('404');
        } else
            return new RedirectResponse(url('login'));
        return $next($request);
    }
}