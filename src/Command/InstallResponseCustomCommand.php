<?php

namespace GlobalXtreme\Response\Command;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class InstallResponseCustomCommand extends Command
{
    protected $signature = 'globalxtreme:response-install';

    public function handle()
    {
        try {

        } catch (\Exception $exception) {
            Log::error($exception);
        }
    }

}
