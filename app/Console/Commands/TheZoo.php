<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Logging\Src\Models\Logging;

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
    public function handle()
    {
        $logging = new Logging();
        $logId = 'zoo_log_' . date('d_m_y');
        $zooKepperIsPresent = true;

        $logging->log($logId, 'info', 'Initiate daily counting of zoo participants');

        $logging->log($logId, 'info', 'Initiate daily counting of zoo participants', [
            'chimpanzees' => '4',
            'elephants' => '2',
            'lions' => '3',
            'giraffes' => '5',
            'zookeeper' => '1'
        ]);

        if (rand(0, 1) === 1) {
            $logging->log($logId, 'warning', 'The zookeeper is not present');
            $zooKepperIsPresent = false;
        }

        $logging->log($logId, 'debug', 'one of the lions went missing', [
            'lions' => '2'
        ]);

        if ($zooKepperIsPresent === false) {
            $logging->log($logId, 'error', 'The zookeeper is still not present');
            $logging->log($logId, 'info', 'The zookeeper is back');
        }

        $logging->log($logId, 'info', 'The Zookeeper found the missing lion', [
            'lions' => '3'
        ]);

        $logging->log($logId, 'error', 'The Lion just ate the Zookeeper', [
            'zookeeper' => '0'
        ]);
    }
}
