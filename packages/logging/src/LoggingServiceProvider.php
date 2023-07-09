<?php

namespace Logging\Src;

use Illuminate\Support\ServiceProvider as ServiceProvider;

class LoggingServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/config/logging.php', 'logging');
    }
}