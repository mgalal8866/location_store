<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use App\Models\branchs;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class Notifyexpirebranch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Notifyexpire:branch';
    protected $description = 'alert user for expire branch';
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {


            foreach (branchs::get() as $branch) {
                if (Carbon::now() >= $branch->expiry_date) {
                    Log::warning($branch->sotres->name);
                }
            }

    }
}
