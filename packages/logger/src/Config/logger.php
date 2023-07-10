<?php

return [
    /* Supported drivers: "text", "cli", "csv"  */
    'driver' => 'cli',
    /* Determine file path */
    'path' => storage_path('custom_logs'),
    /* Map drivers to classes */
    'driver_mapping' => [
        'cli' => 'Logger\Src\Models\LoggerDrivers\CliLoggerDriver',
        'text' => 'Logger\Src\Models\LoggerDrivers\TextLoggerDriver',
        'csv' => 'Logger\Src\Models\LoggerDrivers\CsvLoggerDriver'
    ]
];

