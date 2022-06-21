<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use App\Models\branchs;
use App\Models\tasklog;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Api\Traits\GeneralTrait;

class Notifyexpirebranch extends Command
{
    use GeneralTrait;
    protected $signature = 'Notifyexpire:branch';
    protected $description = 'alert user for expire branch';
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // $branchs = branchs::where('expiry_date', '<', now()->addDays(7))->get();
        //   foreach ($branchs as $branch) {
        //     $notify = $this->notificationFCM( '🔔Alert Expire Branch  ',
        //      ' سوف تنتهى صلاحيه متجرك يوم  ' . $branch->expiry_date ,
        //        [$branch->stores->user->device_token]);
        //     }

        // tasklog::create(['state'=> 'RUN' ,'type'=>   $notify]);


        // $branchs = branchs::where('expiry_date', '=', now()->toFormattedDate())->get();
        //   foreach ($branchs as $branch) {
        //     log::warning($branch);
        //     $notify = $this->notificationFCM(
        //     '🕦 Alert Expire Branch ',//Title
        //      ' تم انتهاء صلاحيه المتجر '//Body
        //      ."\n".
        //      $branch->expiry_date
        //      ."\n".
        //      ' متجرك الان معطل ولايظهر للمستخدمين 🔕 '  ,
        //        [$branch->stores->user->device_token]);

        //     }
        // tasklog::create(['state'=> 'Run Notification' ,'type'=> $notify ]);


        $branchs = branchs::whereActive(0)->get();

        foreach ($branchs as $branch) {
            if($branch->expiry_date ==  now()->toFormattedDate() && $branch->expiry_date != null ){
                // '🕦 Alert Expire Branch ',//Title
                // $titele = ' تم انتهاء صلاحيه المتجر '//Body
                // ."\n".
                // $branch->expiry_date
                // ."\n".
                // ' متجرك الان معطل ولايظهر للمستخدمين 🔕 ';
                 $titele = ' تم انتهاء صلاحيه المتجر   :start_date :expiry_date :newline :username :storename :cityname :regionname ';

                 $titele = str_replace(array(':expiry_date', ':username' ,':storename',':cityname',':regionname' , ":newline", ':start_date'),
                    array($branch->expiry_date, $branch->stores->user->name,$branch->stores->name,$branch->city->name,$branch->region->name , "\n", $branch->start_date),$titele);
                    log::warning( $titele);
                // $notify = $this->notificationFCM(
                // '🕦 Alert Expire Branch ',//Title
                // $titele  ,
                //    [$branch->stores->user->device_token]);
                //    tasklog::create(['state'=> 'Run Notification' ,'type'=> $notify ]);
            }
            if($branch->expiry_date < now()->addDays(7) && $branch->expiry_date != null){
                // $notify = $this->notificationFCM( '🔔Alert Expire Branch  ',
                //      ' سوف تنتهى صلاحيه متجرك يوم  '   ."\n". $branch->expiry_date ,
                //        [$branch->stores->user->device_token]);
                // tasklog::create(['state'=> 'Run Notification' ,'type'=> $notify ]);
            }


          }


    }
}
