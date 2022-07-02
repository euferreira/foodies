<?php

namespace App\Providers;

use App\Http\Contracts\Token\ITokenService;
use App\Models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function __construct($app)
    {
        parent::__construct($app);
    }

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
        $this->app['auth']->viaRequest('api', function ($request) {
            $bearer = str_replace('Bearer ', '', $request->header('Authorization'));
            $data = JWT::decode($bearer, new Key(env('JWT_SECRET'), 'HS256'));
            $user = User::find($data->id);
            if (!empty($user)) {
                return $user;
            }
        });
    }
}
