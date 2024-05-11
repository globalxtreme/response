<?php

namespace GlobalXtreme\Response;

use Illuminate\Support\ServiceProvider;

class ResponseServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/http-status.php' => config_path('http-status.php'),
        ],'response-config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/http-status.php', 'http-status');
    }
}
