<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Middleware\changeLang;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class changeLang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       
        if(session()->has("lang") && session()->get("lang")=="ar"){
            App::setlocale("ar");

        }
        else{
            App:: setlocale("en");
        }
        return $next($request);
    }
}
