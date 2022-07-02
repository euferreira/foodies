<?php

namespace App\Providers;

use App\Http\Contracts\Users\IUsersRepository;
use App\Http\Contracts\Users\IUsersService;
use App\Http\Repositories\UsersRepository;
use App\Http\Services\Users\UsersService;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IUsersService::class, UsersService::class);
        $this->app->bind(IUsersRepository::class, UsersRepository::class);
    }
}
