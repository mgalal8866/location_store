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
        $branchs = branchs::whereActive(0)->get();
        foreach ($branchs as $branch) {
            if($branch->expiry_date ==  now()->toFormattedDate() && $branch->expiry_date != null ){
                $body = str_replace(array(':expiry_date', ':username' ,':storename',':cityname',':regionname' , ":newline", ':start_date'),
                    array($branch->expiry_date, $branch->stores->user->name,$branch->stores->name,$branch->city->name,$branch->region->name , "\n", $branch->start_date), __('notify.task_notify_body_expire_date_branch'));

                $title = str_replace(array(':expiry_date', ':username' ,':storename',':cityname',':regionname' , ":newline", ':start_date'),
                    array($branch->expiry_date, $branch->stores->user->name,$branch->stores->name,$branch->city->name,$branch->region->name , "\n", $branch->start_date), __('notify.task_notify_title_expire_date_branch'));

                $notify = $this->notificationFCM($title,$body ,[$branch->stores->user->device_token]);
                tasklog::create(['state'=>  ($this->description) ,'type'=> $notify ]);
            }
            if($branch->expiry_date < now()->addDays(7)  && $branch->expiry_date ==  now()->toFormattedDate()  &&  $branch->expiry_date != null){
                $body = str_replace(array(':expiry_date', ':username' ,':storename',':cityname',':regionname' , ":newline", ':start_date'),
                array($branch->expiry_date, $branch->stores->user->name,$branch->stores->name,$branch->city->name,$branch->region->name , "\n", $branch->start_date), __('notify.task_notify_body_before_expire_date_branch'));

                $title = str_replace(array(':expiry_date', ':username' ,':storename',':cityname',':regionname' , ":newline", ':start_date'),
                array($branch->expiry_date, $branch->stores->user->name,$branch->stores->name,$branch->city->name,$branch->region->name , "\n", $branch->start_date), __('notify.task_notify_title_before_expire_date_branch'));

                $notify = $this->notificationFCM($title,$body,[$branch->stores->user->device_token]);
                tasklog::create(['state'=>  ($this->description) ,'type'=> $notify ]);
            }
          }
    }
}
