<?php

namespace App\Console;

use App\Console\Commands\DBbackup;
use App\Console\Commands\DBrestore;
use Illuminate\Support\Facades\Log;
use App\Console\Commands\notification;
use App\Console\Commands\Notifybranchviews;
use App\Console\Commands\Notifyexpirebranch;
use App\Console\Commands\Notifyexpireproduct;
use App\Console\Commands\notifyproductviews;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        notification::class,
        DBbackup::class,
        DBrestore::class,
        Notifyexpirebranch::class,
        Notifyexpireproduct::class,
        Notifybranchviews::class,
        notifyproductviews::class
    ];

    protected function schedule(Schedule $schedule)
    {
        if(gettaskvar('activebackupgoogle')==true){
           $schedule->command('db:backup')->cron(gettaskvar('backupgoogle'));

        }
        if(gettaskvar('activenotify')==true){
            $schedule->command('notifi:send')->cron(gettaskvar('notify'));

        }
        if(gettaskvar('activenotifyexpirebranch')==true){
            $schedule->command('Notifyexpire:branch')->cron(gettaskvar('timenotifyexpirebranch'));

        }
        if(gettaskvar('activenotifyexpireproduct')==true){
            $schedule->command('Notifyexpire:product')->cron(gettaskvar('timenotifyexpireproduct'));

        }
        if(gettaskvar('activenotifybranchviews')==true){
            $schedule->command('Notifybranch:views')->cron(gettaskvar('timenotifybranchviews'));

        }
        if(gettaskvar('activenotifyproductviews')==true){
            $schedule->command('Notifyproduct:views')->cron('0 0 * * *');
            log::warning(gettaskvar('timenotifyproductviews'));
        }
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
