<?php

namespace Logger\Src;

use Illuminate\Support\ServiceProvider as ServiceProvider;
use Logger\Src\Models\LoggerDrivers\LoggerDriverFactory;
use Logger\Src\Models\LoggerDrivers\LoggerDriverInterface;

class LoggerServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/Config/logger.php', 'logger');

        $logger = LoggerDriverFactory::create();

        $this->app->instance(LoggerDriverInterface::class, $logger);
    }
}