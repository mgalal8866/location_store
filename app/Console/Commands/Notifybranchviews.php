<?php

namespace App\Console\Commands;

use App\Models\branchs;
use App\Models\tasklog;
use Illuminate\Console\Command;
use App\Http\Controllers\Api\Traits\GeneralTrait;

class Notifybranchviews extends Command
{
    use GeneralTrait;
    protected $signature = 'Notifybranch:views';

    protected $description = 'notify views for branch';

    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        $branchs = branchs::whereActive(0)->get();
        foreach ($branchs as $branch) {
            if($branch->view >= gettaskvar('viewsbranch') && $branch->view != null ){
                $body = str_replace(array(':expiry_date', ':username' ,':storename',':cityname',':regionname' , ":newline", ':start_date'),
                    array($branch->expiry_date, $branch->stores->user->name,$branch->stores->name,$branch->city->name,$branch->region->name , "\n", $branch->start_date), __('notify.task_notify_body_views_branch'));
                $title = str_replace(array(':expiry_date', ':username' ,':storename',':cityname',':regionname' , ":newline", ':start_date'),
                    array($branch->expiry_date, $branch->stores->user->name,$branch->stores->name,$branch->city->name,$branch->region->name , "\n", $branch->start_date), __('notify.task_notify_title_views_branch'));
                $notify = $this->notificationFCM($title,$body ,[$branch->stores->user->device_token]);
                tasklog::create(['state'=>  ($this->description) ,'type'=> $notify ]);
            }

          }
    }
}
