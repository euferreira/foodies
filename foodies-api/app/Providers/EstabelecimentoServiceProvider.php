<?php

namespace App\Providers;

use App\Http\Contracts\Estabelecimento\IEstabelecimentoRepository;
use App\Http\Contracts\Estabelecimento\IEstabelecimentoService;
use App\Http\Repositories\EstabelecimentoRepository;
use App\Http\Services\EstabelecimentoService;
use Carbon\Laravel\ServiceProvider;

class EstabelecimentoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IEstabelecimentoService::class, EstabelecimentoService::class);
        $this->app->bind(IEstabelecimentoRepository::class, EstabelecimentoRepository::class);
    }
}
