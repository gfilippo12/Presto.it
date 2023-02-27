<?php

namespace App\Http\Middleware;

use Mockery\Matcher\Closure;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsRevisor
{
      // * probelemi .... request  closure video 17:20

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->is_revisor) {
            return $next($request);
        }
        return redirect('/')->with('access.denied', 'Attenzione! Solo i revisori hanno accesso a quest\'area.');
    }

}
