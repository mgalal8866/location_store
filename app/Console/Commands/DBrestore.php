<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;

class DBrestore extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DB:Restore';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Restore';

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
        $filename = "backup-" . Carbon::now()->format('Y-m-d') . ".gz";
        $command = "mysqldump --user=" . env('DB_USERNAME') ." --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . " > " . storage_path() . '/app/backup/backup-2022-05-13.sql';
        $returnVar = NULL;
        $output  = NULL;
        exec($command, $output, $returnVar);
    }
}
