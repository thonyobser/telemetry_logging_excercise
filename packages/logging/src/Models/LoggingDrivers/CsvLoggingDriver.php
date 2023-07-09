<?php

namespace Logging\Src\Models\LoggingDrivers;

use Logging\Src\Models\LoggingDrivers\helper\FileHandler;

class CsvLoggingDriver implements LoggingDriverInterface
{
    public function log(string $id, string $loglevel, string $message, array|string $attributes): void
    {
        $fileHandler = new FileHandler($id . '.csv');
        $fileHandler->open();
        $file = $fileHandler->getFile();
        fputcsv($file, [$loglevel, $message, $attributes]);
        $fileHandler->close();
    }
}