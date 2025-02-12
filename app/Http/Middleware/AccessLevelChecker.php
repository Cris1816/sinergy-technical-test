<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AccessLevelChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $accessToken = $request->bearerToken();
        $serverAccessToken = config('services.access.token');  

        if(Auth::check())
        {
            return $next($request);   
        }

        if ($request->user()->accessLevel >= 2) 
        {
            return $next($request);
        }

        return response()->json(["message" => "Unauthorized"], Response::HTTP_FORBIDDEN);
    }
}
