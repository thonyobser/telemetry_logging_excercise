<?php

namespace Logger\Src;

use Illuminate\Support\ServiceProvider as ServiceProvider;

class LoggerServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/Config/logger.php', 'logger');
    }
}