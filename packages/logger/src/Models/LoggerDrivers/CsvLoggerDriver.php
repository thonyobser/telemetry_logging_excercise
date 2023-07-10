<?php

namespace Logger\Src\Models\LoggerDrivers;

use Logger\Src\Models\helper\FileHandler;

class CsvLoggerDriver implements LoggerDriverInterface
{
    public function addRecord(string $id, string $logLevel, string $message, array $attributes = []): void
    {
        $fileHandler = new FileHandler($id . '.csv');
        $fileHandler->open();
        $file = $fileHandler->getFile();
        fputcsv($file, [$logLevel, $message, json_encode($attributes)]);
        $fileHandler->close();
    }

    public function error(string $id, string $message, array $attributes = []): void
    {
        $this->addRecord($id, self::ERROR, $message, $attributes);
    }

    public function warning(string $id, string $message, array $attributes = []): void
    {
        $this->addRecord($id, self::WARNING, $message, $attributes);
    }

    public function info(string $id, string $message, array $attributes = []): void
    {
        $this->addRecord($id, self::INFO, $message, $attributes);
    }

    public function debug(string $id, string $message, array $attributes = []): void
    {
        $this->addRecord($id, self::DEBUG, $message, $attributes);
    }
}