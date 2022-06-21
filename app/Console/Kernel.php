<?php

namespace App\Console;

use App\Console\Commands\DBbackup;
use App\Console\Commands\DBrestore;
use Illuminate\Support\Facades\Log;
use App\Console\Commands\notification;
use App\Console\Commands\Notifyexpirebranch;
use App\Console\Commands\Notifyexpireproduct;
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
        Notifyexpireproduct::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('db:backup')->cron(getSettingsOf('backupgoogle'));
        // $schedule->command('notifi:send')->cron(getSettingsOf('notify'));
        // $schedule->command('Notifyexpire:product')->cron(getSettingsOf('notify'));
        $schedule->command('Notifyexpire:branch')->everyMinute();

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
