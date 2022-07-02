<?php

namespace App\Providers;

use App\Http\Contracts\Code\ICodeRepository;
use App\Http\Contracts\Code\ICodeService;
use App\Http\Repositories\CodeRepository;
use App\Http\Services\Code\CodeService;
use Illuminate\Support\ServiceProvider;

class CodeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ICodeService::class, CodeService::class);
        $this->app->bind(ICodeRepository::class, CodeRepository::class);
    }
}
