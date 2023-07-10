<?php

namespace Logger\Src\Models\LoggerDrivers;

use Exception;

class LoggerDriverFactory
{
    const drivers = [
        'text',
        'cli',
        'csv'
    ];

    /**
     * @throws Exception
     */
    public static function create(): LoggerDriverInterface
    {
        if (!in_array(config('logger.driver'), self::drivers)) {
            throw new Exception('Logging driver is not valid');
        }

        $type = config('logger.driver');
        $classname = config("logger.driver_mapping.${type}");
        return new $classname();
    }
}