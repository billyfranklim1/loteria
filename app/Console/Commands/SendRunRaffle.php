<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\RunPrizeDraw;

class SendRunPrizeDraw extends Command
{
    /**
     * The name and signature of the console command. with arguments optional
     *
     * @var string
     */
    protected $signature = 'send:run-prize-draw {--code=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send run prize draw';

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
        RunPrizeDraw::dispatch($code);
        return 0;
    }
}
