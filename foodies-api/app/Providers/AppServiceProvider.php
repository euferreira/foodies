<?php

namespace App\Providers;

use App\Http\Contracts\Auth\IAuthRepository;
use App\Http\Contracts\Auth\IAuthService;
use App\Http\Contracts\Cache\ICacheRepository;
use App\Http\Contracts\Cache\ICacheService;
use App\Http\Contracts\Token\ITokenRepository;
use App\Http\Contracts\Token\ITokenService;
use App\Http\Repositories\AuthRepository;
use App\Http\Repositories\CacheRepository;
use App\Http\Repositories\TokenRepository;
use App\Http\Services\Auth\AuthService;
use App\Http\Services\Cache\CacheService;
use App\Http\Services\Token\TokenService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IAuthService::class, AuthService::class);
        $this->app->bind(IAuthRepository::class, AuthRepository::class);

        $this->app->bind(ITokenService::class, TokenService::class);
        $this->app->bind(ITokenRepository::class, TokenRepository::class);

        $this->app->bind(ICacheService::class, CacheService::class);
        $this->app->bind(ICacheRepository::class, CacheRepository::class);
    }
}
