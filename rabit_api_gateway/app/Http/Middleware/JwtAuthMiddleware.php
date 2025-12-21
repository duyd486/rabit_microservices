<?php

namespace App\Http\Middleware;

use App\Helpers\ApiResponse;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            // parse & verify token
            $user = JWTAuth::parseToken()->authenticate();

            // gắn user vào request (tuỳ dùng)
            $request->attributes->set('auth_user', $user);

        } catch (JWTException $e) {
            return ApiResponse::unauthorized();
        }

        return $next($request);
    }
}
