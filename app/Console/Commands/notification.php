<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\tasklog;

use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Api\Traits\GeneralTrait;

class notification extends Command
{
    use GeneralTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notifi:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send Notifiction';

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
        log::warning('notifi');
        $firebaseToken =   User::whereNotNull('device_token')->get();
        $notify = $this->notificationFCM( 'رسالة تلقائية',
        Carbon::now(). ' تم ارسال  -  ' .$firebaseToken->pluck('name')[0],
        $firebaseToken,
       'https://www.holidayhometimes.com/wp-content/uploads/2013/03/HHT-location.jpg',);

        tasklog::create(['state'=> 'RUN' ,'type' => 'Notification']);
        // return      ;



    }
}
