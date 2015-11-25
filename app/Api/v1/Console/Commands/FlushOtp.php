<?php
/**
 * This class is for managing basic api related functionalities
 * It will be used as base class for consuming third party api
 *
 * @author Gaurav Patel <gaurav.orbit@gmail.com>
 * @package Api
 * @since 1.0
 */

namespace App\Api\v1\Console\Commands;

use DB;
use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

class FlushOtp extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "flush:otp";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Flush the Phone specific OTP log.';

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
        $formattedDate = \Carbon\Carbon::now()->subDays(2)->toDateTimeString();
        $affected = DB::table('temp_user_otps')->where('created_at', '<=', $formattedDate)->delete();
        //$this->info('Display this on the screen');
        //$this->error('Something went wrong!');
        $this->comment(PHP_EOL . "Business logic to flush Phone specific OTP logs. {$formattedDate} {$affected}" . PHP_EOL);
    }
}
