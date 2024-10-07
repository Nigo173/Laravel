<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;

class AdminsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // session_start();
        // $request->session()->exists('a_Id');


        if($request->session()->exists('a_Id') && !$request->session()->missing('a_Id'))
        {
            return $next($request);
        }
        else
        {
            return redirect()->route('login',['err'=>2]);
        }
        // return $next($request);
        // return Response('Chegamos sss');
    }
}
