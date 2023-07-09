<?php

namespace Logging\Src\Models\LoggingDrivers;

use Logging\Src\Models\LoggingDrivers\helper\FileHandler;

class TextLoggingDriver implements LoggingDriverInterface
{
    public function log(string $id, string $loglevel, string $message, array|string $attributes): void
    {
        $fileHandler = new FileHandler($id . '.log');
        $fileHandler->open();
        $file = $fileHandler->getFile();
        fwrite($file, $message);
        $fileHandler->close();
    }
}