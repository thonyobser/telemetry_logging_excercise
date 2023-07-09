<?php

namespace Logging\Src\Models\LoggingDrivers;

interface LoggingDriverInterface
{
    public function log(string $id, string $loglevel, string $message, array|string $attributes): void;
}