<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckConnection
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

        $check = \Illuminate\Support\Facades\DB::connection()->getDatabaseName();

        if ($check == null){
            return redirect()->route('connection');
        }
        return $next($request);
    }
}
