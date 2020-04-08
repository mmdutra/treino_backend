<?php

namespace App\Http\Middleware;

use App\Repositories\UserRepository;
use Closure;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;
use Illuminate\Http\Request;

class JwtMiddleware
{
    public function handle(Request $request, Closure $next, $guard = null)
    {
        $token = $request->header('Authorization');

        try {
            $credentials = JWT::decode($token, env('JWT_SECRET'), ['HS256']);
        } catch(ExpiredException $e) {
            return response()->json([
                'error' => 'Provided token is expired.'
            ], 400);

        } catch(Exception $e) {
            return response()->json([
                'error' => 'Unauthorized'
            ], 400);
        }

        $user = (new UserRepository())->find($credentials->sub);

        if (!$user) return response()->json([ 'error' => 'Unauthorized' ], 401);

        // Now let's put the user in the request class so that you can grab it from there
        $request->auth = $user;

        return $next($request);
    }
}
