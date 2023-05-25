<?php

namespace App\Console\Commands;

use App\Jobs\CalculateDataJob;
use App\Jobs\TestSendEmail;
use Illuminate\Console\Command;

class CobaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coba:queue';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        for ($x = 1; $x <= 10; $x++) {
            CalculateDataJob::dispatch($x);
        }

        return Command::SUCCESS;
    }
}
