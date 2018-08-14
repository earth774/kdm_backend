<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Middleware;

/**
 * Description of JwtMiddleware
 *
 * @author nat
 */
use Closure;
use Exception;
use App\User;
use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;
use Illuminate\Support\Facades\Crypt;

class JwtMiddleware
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (env('USER_MANAGEMENT_SUPPORT') == 1) {
            return $this->handleUserManagement($request, $next, $guard);
        }

        $token = $request->header('Authorization');
        $refresh_token = $request->header('refresh-token');
        $user_id = 0;

        if(!$token) {
            // Unauthorized response if token not there
            return response()->json([
                'error' => 'Token not provided.'
            ], 401);
        }

        try {
            $credentials = JWT::decode($token, env('JWT_SECRET'), ['HS256']);
        } catch(ExpiredException $e) {
            if ($refresh_token) {
                $user_id = Crypt::decryptString($refresh_token);
                
            } else {
                return response()->json([
                    'error' => 'Provided token is expired.'
                ], 400);
            }
        } catch(Exception $e) {
            return response()->json([
                'error' => 'An error while decoding token.'
            ], 400);
        }

        if ($user_id) {
            $user = User::find($user_id);
            $request->new_token = $this->genToken($user_id);
        } else {
            $user = User::find($credentials->sub);
            $request->new_token = null;
        }

        // Now let's put the user in the request class so that you can grab it from there
        $request->auth = $user;

        return $next($request);
    }

    public function genToken($user_id)
    {
        $payload = [
            'iss' => "lumen-jwt", // Issuer of the token
            'sub' => $user_id, // Subject of the token
            'iat' => time(), // Time when JWT was issued.
            'exp' => time() + env('JWT_EXPIRE_HOUR')*60*60 // Expiration time
        ];

        // As you can see we are passing `JWT_SECRET` as the second parameter that will
        // be used to decode the token in the future.
        return JWT::encode($payload, env('JWT_SECRET'));
    }

    private function handleUserManagement($request, Closure $next, $guard = null)
    {
        $token = $request->header('Authorization');
        $refresh_token = $request->header('refresh-token');
        $requester = $request->header('requester');
        $user_id = 0;

        if(!$token) {
            // Unauthorized response if token not there
            return response()->json([
                'error' => 'Token not provided.'
            ], 401);
        }

        try {
            $credentials = JWT::decode($token, env('JWT_SECRET'), ['HS256']);
        } catch(ExpiredException $e) {
            if ($refresh_token) {
                $user_id = Crypt::decryptString($refresh_token);
                
            } else {
                return response()->json([
                    'error' => 'Provided token is expired.'
                ], 400);
            }
        } catch(Exception $e) {
            return response()->json([
                'error' => 'An error while decoding token.'
            ], 400);
        }

        if ($user_id) {
            if ($requester && $requester === 'user_management') {
                $user = User::where('user_management_id', $user_id);
                $request->new_token = $this->genToken($user_id);
            } else {
                $user = User::find($user_id);
                $request->new_token = $this->genToken($user_id);
            }
        } else {
            if ($requester && $requester === 'user_management') {
                $user = User::where('user_management_id', $credentials->sub);
                $request->new_token = null;
            } else {
                $user = User::find($credentials->sub);
                $request->new_token = null;
            }
        }

        // Now let's put the user in the request class so that you can grab it from there
        $request->auth = $user;

        return $next($request);
    }
}
