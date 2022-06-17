<?php

namespace App\Console;

use App\Console\Commands\DBbackup;
use App\Console\Commands\DBrestore;
use Illuminate\Support\Facades\Log;
use App\Console\Commands\notification;
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
        notification::class
        ,DBbackup::class,
        DBrestore::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('db:backup')->weekly();
        // $schedule->command('backup:run')->everyFiveMinutes();
        $schedule->command('notifi:send')->cron('* * * * *');
        // $schedule->command('DB:Restore')->everyMinute();
        // Log::info("working");
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
