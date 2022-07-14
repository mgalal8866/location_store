<?php

namespace App\Console\Commands;

use App\Models\tasklog;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Artisan;

class DBbackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DB:BACKUP';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'BACKUP DATABACE';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        log::warning('BACKUP');
        // $filename = "backup-" . Carbon::now()->format('Y-m-d') . ".gz";
        // $command = "mysqldump --user=" . env('DB_USERNAME') ." --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . "  | gzip > " . storage_path() . '/app/backup/' . $filename ;
        // $returnVar = NULL;
        // $output  = NULL;
        // exec($command, $output, $returnVar);


        Artisan::call('backup:run');
        tasklog::create(['state'=> 'RUN' ,'type'=>'Back up To Google Drive']);
        // return 0;

    }
}
