<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Logger\Src\Models\LoggerDrivers\LoggerDriverFactory;
use Logger\Src\Models\LoggerDrivers\LoggerDriverInterface;

class TheZoo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:the-zoo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command serves as a playground for the requested logging plugin';

    /**
     * Execute the console command.
     * @throws Exception
     */
    public function handle(LoggerDriverInterface $logger): void
    {
        $logId = 'zoo_log_' . date('d_m_y');

        $logger->info($logId, 'Initiate daily counting of zoo participants', [
            'chimpanzees' => '4',
            'elephants' => '2',
            'lions' => '3',
            'giraffes' => '5',
            'zookeeper' => '1'
        ]);

        $logger->warning($logId, 'The zookeeper is not present');

        $logger->debug($logId, 'one of the lions went missing', [
            'lions' => '2'
        ]);

        $logger->info($logId, 'The zookeeper is back');

        $logger->info($logId, 'The Zookeeper found the missing lion', [
            'lions' => '3'
        ]);

        $logger->error($logId, 'The Lion just ate the Zookeeper', [
            'zookeeper' => '0'
        ]);
    }
}
