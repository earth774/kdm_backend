<?php

namespace App\Providers;

use Firebase\JWT\JWT;
use App\Status;
use App\User;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.

        $this->app['auth']->viaRequest('api', function ($request) {

            $token = $request->header('Authorization');
            if(!$token) {
                // Unauthorized response if token not there
                return null;
            }

            try {
                $credentials = JWT::decode($token, "JhbGciOiJIUzI1N0eXAiOiJKV1QiLC", ['HS256']);
            } catch(Exception $e) {
                return null;
            }

            $user = User::find($credentials->sub);
            return $user;
        });
    }
}
