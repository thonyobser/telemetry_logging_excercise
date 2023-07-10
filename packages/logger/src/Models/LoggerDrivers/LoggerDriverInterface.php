<?php

namespace Logger\Src\Models\LoggerDrivers;

interface LoggerDriverInterface
{
    /* This could be solved via php enums in 8.1 */
    public const ERROR = 'Error';
    public const WARNING = 'Warning';
    public const INFO = 'Info';
    public const DEBUG = 'Debug';

    public function addRecord(string $id, string $logLevel, string $message, array $attributes = []): void;
    public function error(string $id, string $message, array $attributes = []): void;
    public function warning(string $id, string $message, array $attributes = []): void;
    public function info(string $id, string $message, array $attributes = []): void;
    public function debug(string $id, string $message, array $attributes = []): void;
}