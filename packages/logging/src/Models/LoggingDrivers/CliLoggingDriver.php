<?php

namespace Logging\Src\Models\LoggingDrivers;

class CliLoggingDriver implements LoggingDriverInterface
{
    public function log(string $id, string $loglevel, string $message, array|string $attributes): void
    {
        echo $message;
    }
}