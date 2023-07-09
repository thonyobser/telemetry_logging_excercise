<?php

namespace Logging\Src\Models\LoggingDrivers\helper;

class FileHandler
{
    private string|null $loggingPath = null;
    private string|null $fileName = null;
    private mixed $file = null;

    public function __construct($fileName)
    {
        $this->loggingPath = config('logging.path');
        $this->fileName = $fileName;

        if (!file_exists($this->loggingPath)) {
            mkdir($this->loggingPath, 0777, true);
        }
    }

    public function open(): void
    {
        $this->file = fopen($this->loggingPath . '/' . $this->fileName, 'a');
    }

    public function close(): void
    {
        fclose($this->file);
    }

    public function getFile(): mixed
    {
        return $this->file;
    }
}