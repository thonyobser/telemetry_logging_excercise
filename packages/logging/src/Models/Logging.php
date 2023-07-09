<?php

namespace Logging\Src\Models;

use Exception;
use Logging\Src\Models\LoggingDrivers\LoggingDriverFactory;
use Logging\Src\Models\LoggingDrivers\LoggingDriverInterface;

class Logging
{
    private LoggingDriverInterface|null $loggingDriver = null;
    const LogLevels = [
        'info',
        'warning',
        'error',
        'debug'
    ];

    const drivers = [
        'text',
        'cli',
        'csv'
    ];

    const useJsonFormatForAttributes = [
        'text',
        'csv',
        'cli'
    ];

    const useStringForMessage = [
        'text',
        'cli'
    ];

    /**
     * @throws Exception
     */
    public function __construct()
    {
        if (!in_array(config('logging.driver'), self::drivers)) {
            throw new Exception('Logging driver is not valid');
        }

        if (config('logging.enabled') === false) {
            return;
        }

        $this->loggingDriver = (new LoggingDriverFactory(config('logging.driver')))->getLoggingDriver();
    }

    /**
     * @throws Exception
     */
    public function log(string $id, string $loglevel, string $message, array $attributes = []): void
    {
        if ($id === '') {
            throw new Exception('Id is not set');
        }

        if (!in_array($loglevel, self::LogLevels)) {
            throw new Exception('Loglevel is not valid');
        }

        if (in_array(config('logging.driver'), self::useJsonFormatForAttributes)) {
            $attributes = !empty($attributes) ? json_encode( $attributes) : '{}';
        }

        if (in_array(config('logging.driver'), self::useStringForMessage)) {
            $message = "{$loglevel}: {$message} | {$attributes}" . PHP_EOL;
        }

        $this->loggingDriver->log($id, $loglevel, $message, $attributes);
    }
}