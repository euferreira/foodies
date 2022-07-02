<?php

namespace App\Providers;

use App\Http\Contracts\Reservas\IReservaRepository;
use App\Http\Contracts\Reservas\IReservaService;
use App\Http\Repositories\ReservaRepository;
use App\Http\Services\ReservaService;
use Carbon\Laravel\ServiceProvider;

class ReservaServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IReservaService::class, ReservaService::class);
        $this->app->bind(IReservaRepository::class, ReservaRepository::class);
    }
}
