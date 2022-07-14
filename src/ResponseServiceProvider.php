<?php

namespace GlobalXtreme\Response;

use Illuminate\Support\ServiceProvider;

class ResponseServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {

            $this->commands([
                Console\GlobalXtremeResponseInstallCommand::class
            ]);

        }
    }

    public function register()
    {
        //
    }
}
