<?php

namespace Logging\Src\Models\LoggingDrivers;

class FileLoggingDriver implements LoggingDriverInterface
{
    public function log(string $id, string $loglevel, string $message, array|string $attributes):void
    {
        if (!file_exists(config('logging.path'))) {
            mkdir(config('logging.path'), 0777, true);
        }

        $file = fopen(config('logging.path') . '/' . $id . '.log', 'a');
        fwrite($file, $message);
        fclose($file);
    }
}