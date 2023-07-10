<?php

namespace Logger\Src\Models\helper;

class FileHandler
{
    private string|null $loggerPath = null;
    private string|null $fileName = null;
    private mixed $file = null;

    public function __construct($fileName)
    {
        $this->loggerPath = config('logger.path');
        $this->fileName = $fileName;

        if (!file_exists($this->loggerPath)) {
            mkdir($this->loggerPath, 0777, true);
        }
    }

    public function open(): void
    {
        $this->file = fopen($this->loggerPath . '/' . $this->fileName, 'a');
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