<?php

namespace Logging\Src\Models\LoggingDrivers;

class LoggingDriver
{
    private LoggingDriverInterface $loggingDriver;

    public function __construct($type)
    {
        $classname = "Logging\Src\Models\LoggingDrivers\\${type}LoggingDriver";
        $this->loggingDriver = new $classname();
    }

    public function getLoggingDriver(): LoggingDriverInterface
    {
        return $this->loggingDriver;
    }
}