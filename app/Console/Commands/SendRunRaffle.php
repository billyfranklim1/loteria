<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\RunRaffle;

class SendRunRaffle extends Command
{
    /**
     * The name and signature of the console command. with arguments optional
     *
     * @var string
     */
    protected $signature = 'send:run-raffle {--code=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send run raffle';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $code = $this->option('code');
        RunRaffle::dispatch($code);
        return 0;
    }
}
