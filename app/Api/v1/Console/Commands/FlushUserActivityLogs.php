<?php

 namespace App\Api\v1\Console\Commands;

use DB;
use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;
use Activity;

class FlushUserActivityLogs extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "flush:activitylogs";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Flush the User specific activity logs.';

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
     * @return mixed
     */
    public function handle()
    {
        Activity::cleanLog();
        //$this->info('Display this on the screen');
        //$this->error('Something went wrong!');
        $this->comment(PHP_EOL . "Business logic to flush user specific Activity logs." . PHP_EOL);
    }
}
